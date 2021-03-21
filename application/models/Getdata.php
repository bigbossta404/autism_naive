<?php

class Getdata extends CI_Model
{
    // function get70()
    // {
    //     $query = $this->db->query("SELECT FLOOR(COUNT(*)*0.7) AS cekdatalatih FROM data_latih");
    //     return $query->row_array();
    // }
    function countDataUji()
    {
        $query = $this->db->query("SELECT * FROM data_uji");
        return $query->result_array();
    }

    function getDataNo()
    {
        $query = $this->db->query("WITH cte AS (
            SELECT *, ROW_NUMBER() OVER (ORDER BY RAND()) rn, COUNT(*) OVER () cnt
            FROM dataset WHERE Class = 'NO' ORDER BY RAND()
        )
        SELECT *
        FROM cte
        WHERE rn < 0.3 * cnt");
        return $query->result_array();
    }
    function notInDataUji()
    {
        $query = $this->db->query(" SELECT * FROM dataset
        WHERE id_dataset NOT IN (SELECT id_uji FROM data_uji)");
        return $query->result_array();
    }
    function getDataYes()
    {
        $query = $this->db->query("WITH cte AS (
            SELECT *, ROW_NUMBER() OVER (ORDER BY RAND()) rn, COUNT(*) OVER () cnt
            FROM dataset WHERE Class = 'YES' ORDER BY RAND()
        )
        SELECT *
        FROM cte
        WHERE rn < 0.3 * cnt");
        return $query->result_array();
    }
    function check_Age()
    {
        $query = $this->db->query("SELECT count(age) age FROM dataset
        WHERE age = 0");
        return $query->row_array();
    }
    function avg_Age()
    {
        $query = $this->db->query("SELECT (SELECT AVG(age) FROM dataset WHERE Class = 'YES') rerata_YES,
        (SELECT AVG(age) FROM dataset WHERE Class = 'NO') rerata_NO");
        return $query->row_array();
    }

    function getClass()
    {
        $query = $this->db->query(
            "SELECT COLUMN_NAME FROM information_schema.columns WHERE table_name = 'dataset' AND column_name = 'CLASS' GROUP BY column_name"
        );
        return $query->row_array();
    }

    var $column_order = array(null, 'id_dataset', 'A1_Score', 'A2_Score', 'A3_Score', 'A4_Score', 'A5_Score', 'A6_Score', 'A7_Score', 'A8_Score', 'A9_Score', 'A10_Score', 'age', 'gender', 'jundice', 'autism', 'Class'); //set column field database for datatable orderable
    var $column_search = array('id_dataset', 'A1_Score', 'A2_Score', 'A3_Score', 'A4_Score', 'A5_Score', 'A6_Score', 'A7_Score', 'A8_Score', 'A9_Score', 'A10_Score', 'age', 'gender', 'jundice', 'autism', 'Class'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = ['id_dataset' => 'desc']; // default

    private function _get_datatables()
    {

        $this->db->select('id_dataset,
        A1_Score,
        A2_Score,
        A3_Score,
        A4_Score,
        A5_Score,
        A6_Score,
        A7_Score,
        A8_Score,
        A9_Score,
        A10_Score,
        age,
        gender,
        jundice,
        autism,
        Class
        ');
        $this->db->from('dataset');

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->_get_datatables());

        return $this->db->count_all_results();
    }

    public function countrow()
    {
        $this->db->select('COUNT(*) jml_data_latih');
        $this->db->from('dataset');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function countatrib()
    {
        $this->db->select('COUNT(*)-7 jml_atrib');
        $this->db->from('information_schema.columns');
        $this->db->where('table_name', 'dataset');
        $query = $this->db->get();
        return $query->row_array();
    }


    //================= DATA UJI
    var $coluji_order = array(null, 'id_uji', 'A1_Score', 'A2_Score', 'A3_Score', 'A4_Score', 'A5_Score', 'A6_Score', 'A7_Score', 'A8_Score', 'A9_Score', 'A10_Score', 'age', 'gender', 'jundice', 'autism', 'Class'); //set column field database for datatable orderable
    var $coluji_search = array('id_uji', 'A1_Score', 'A2_Score', 'A3_Score', 'A4_Score', 'A5_Score', 'A6_Score', 'A7_Score', 'A8_Score', 'A9_Score', 'A10_Score', 'age', 'gender', 'jundice', 'autism', 'Class'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $orderuji = ['id_uji' => 'asc']; // default

    private function _get_datatables_uji()
    {

        $this->db->select('*');
        $this->db->from('data_uji');

        $i = 0;

        foreach ($this->coluji_search as $item) // loop column
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->coluji_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->coluji_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $orderuji = $this->orderuji;
            $this->db->order_by(key($orderuji), $orderuji[key($orderuji)]);
        }
    }

    function get_datatables_uji()
    {
        $this->_get_datatables_uji();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_uji()
    {
        $this->_get_datatables_uji();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_uji()
    {
        $this->db->from($this->_get_datatables_uji());

        return $this->db->count_all_results();
    }
    //================= DATA UJI
    var $collatih_order = array(null, 'id_latih', 'A1_Score', 'A2_Score', 'A3_Score', 'A4_Score', 'A5_Score', 'A6_Score', 'A7_Score', 'A8_Score', 'A9_Score', 'A10_Score', 'age', 'gender', 'jundice', 'autism', 'Class'); //set column field database for datatable orderable
    var $collatih_search = array('id_latih', 'A1_Score', 'A2_Score', 'A3_Score', 'A4_Score', 'A5_Score', 'A6_Score', 'A7_Score', 'A8_Score', 'A9_Score', 'A10_Score', 'age', 'gender', 'jundice', 'autism', 'Class'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $orderlatih = ['id_latih' => 'asc']; // default

    private function _get_datatables_latih()
    {

        $this->db->select('*');
        $this->db->from('data_latih');

        $i = 0;

        foreach ($this->collatih_search as $item) // loop column
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->collatih_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->collatih_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $orderlatih = $this->orderlatih;
            $this->db->order_by(key($orderlatih), $orderlatih[key($orderlatih)]);
        }
    }

    function get_datatables_latih()
    {
        $this->_get_datatables_latih();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_latih()
    {
        $this->_get_datatables_latih();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_latih()
    {
        $this->db->from($this->_get_datatables_uji());

        return $this->db->count_all_results();
    }
    //========================
    public function countatrib_uji()
    {
        $this->db->select('COUNT(*)-8 jml_atrib');
        $this->db->from('information_schema.columns');
        $this->db->where('table_name', 'dataset');
        $query = $this->db->get();
        return $query->row_array();
    }


    //=======================================

    function getA_score()
    {
        $query = $this->db->query("
            SELECT (SELECT COUNT(A1_Score) FROM dataset WHERE A1_Score = 1 AND CLASS = 'no') A1_YES_NORMAL, 
            (SELECT COUNT(A1_Score) FROM dataset WHERE A1_Score = 0 AND CLASS = 'no' ) A1_NO_NORMAL, 
            (SELECT COUNT(A1_Score) FROM dataset WHERE A1_Score = 1 AND CLASS = 'yes') A1_YES_AUTIS, 
            (SELECT COUNT(A1_Score) FROM dataset WHERE A1_Score = 0 AND CLASS = 'yes' ) A1_NO_AUTIS, 

            (SELECT COUNT(A2_Score) FROM dataset WHERE A2_Score = 1 AND CLASS = 'no' ) A2_YES_NORMAL, 
            (SELECT COUNT(A2_Score) FROM dataset WHERE A2_Score =0 AND CLASS = 'no') A2_NO_NORMAL,
            (SELECT COUNT(A2_Score) FROM dataset WHERE A2_Score = 1 AND CLASS = 'yes' ) A2_YES_AUTIS, 
            (SELECT COUNT(A2_Score) FROM dataset WHERE A2_Score =0 AND CLASS = 'yes') A2_NO_AUTIS,

            (SELECT COUNT(A3_Score) FROM dataset WHERE A3_Score = 1 AND CLASS = 'no' ) A3_YES_NORMAL, 
            (SELECT COUNT(A3_Score) FROM dataset WHERE A3_Score =0 AND CLASS = 'no' ) A3_NO_NORMAL,
            (SELECT COUNT(A3_Score) FROM dataset WHERE A3_Score = 1 AND CLASS = 'yes') A3_YES_AUTIS, 
            (SELECT COUNT(A3_Score) FROM dataset WHERE A3_Score =0 AND CLASS = 'yes') A3_NO_AUTIS,

            (SELECT COUNT(A4_Score) FROM dataset WHERE A4_Score = 1 AND CLASS = 'no' ) A4_YES_NORMAL, 
            (SELECT COUNT(A4_Score) FROM dataset WHERE A4_Score =0 AND CLASS = 'no' ) A4_NO_NORMAL,
            (SELECT COUNT(A4_Score) FROM dataset WHERE A4_Score = 1 AND CLASS = 'yes') A4_YES_AUTIS, 
            (SELECT COUNT(A4_Score) FROM dataset WHERE A4_Score =0 AND CLASS = 'yes') A4_NO_AUTIS,


            (SELECT COUNT(A5_Score) FROM dataset WHERE A5_Score = 1 AND CLASS = 'no') A5_YES_NORMAL,
            (SELECT COUNT(A5_Score) FROM dataset WHERE A5_Score =0  AND CLASS = 'no') A5_NO_NORMAL,
            (SELECT COUNT(A5_Score) FROM dataset WHERE A5_Score = 1 AND CLASS = 'yes') A5_YES_AUTIS,
            (SELECT COUNT(A5_Score) FROM dataset WHERE A5_Score =0 AND CLASS = 'yes') A5_NO_AUTIS,

            (SELECT COUNT(A6_Score) FROM dataset WHERE A6_Score = 1 AND CLASS = 'no' ) A6_YES_NORMAL, 
            (SELECT COUNT(A6_Score) FROM dataset WHERE A6_Score =0 AND CLASS = 'no') A6_NO_NORMAL,
            (SELECT COUNT(A6_Score) FROM dataset WHERE A6_Score = 1 AND CLASS = 'yes') A6_YES_AUTIS, 
            (SELECT COUNT(A6_Score) FROM dataset WHERE A6_Score =0 AND CLASS = 'yes') A6_NO_AUTIS,


            (SELECT COUNT(A7_Score) FROM dataset WHERE A7_Score = 1 AND CLASS = 'no') A7_YES_NORMAL, 
            (SELECT COUNT(A7_Score) FROM dataset WHERE A7_Score =0 AND CLASS = 'no') A7_NO_NORMAL,
            (SELECT COUNT(A7_Score) FROM dataset WHERE A7_Score = 1 AND CLASS = 'yes') A7_YES_AUTIS, 
            (SELECT COUNT(A7_Score) FROM dataset WHERE A7_Score =0 AND CLASS = 'yes') A7_NO_AUTIS,

            (SELECT COUNT(A8_Score) FROM dataset WHERE A8_Score = 1 AND CLASS = 'no' ) A8_YES_NORMAL, 
            (SELECT COUNT(A8_Score) FROM dataset WHERE A8_Score =0 AND CLASS = 'no') A8_NO_NORMAL,
            (SELECT COUNT(A8_Score) FROM dataset WHERE A8_Score = 1 AND CLASS = 'yes') A8_YES_AUTIS, 
            (SELECT COUNT(A8_Score) FROM dataset WHERE A8_Score =0 AND CLASS = 'yes') A8_NO_AUTIS,

            (SELECT COUNT(A9_Score) FROM dataset WHERE A9_Score = 1 AND CLASS = 'no') A9_YES_NORMAL, 
            (SELECT COUNT(A9_Score) FROM dataset WHERE A9_Score =0 AND CLASS = 'no') A9_NO_NORMAL,
            (SELECT COUNT(A9_Score) FROM dataset WHERE A9_Score = 1 AND CLASS = 'yes' ) A9_YES_AUTIS, 
            (SELECT COUNT(A9_Score) FROM dataset WHERE A9_Score =0 AND CLASS = 'yes') A9_NO_AUTIS,

            (SELECT COUNT(A10_Score) FROM dataset WHERE A10_Score = 1 AND CLASS = 'no') A10_YES_NORMAL, 
            (SELECT COUNT(A10_Score) FROM dataset WHERE A10_Score =0 AND CLASS = 'no') A10_NO_NORMAL,
            (SELECT COUNT(A10_Score) FROM dataset WHERE A10_Score = 1 AND CLASS = 'yes') A10_YES_AUTIS, 
            (SELECT COUNT(A10_Score) FROM dataset WHERE A10_Score =0 AND CLASS = 'yes') A10_NO_AUTIS
        ");
        return $query->result_array();
    }

    function getAutism()
    {
        $query = $this->db->query("SELECT (SELECT COUNT(CLASS) FROM dataset WHERE CLASS = 'yes') Autism, (SELECT COUNT(CLASS) FROM data_latih WHERE CLASS = 'no') Normal");
        return $query->row_array();
    }

    function getGender()
    {
        $query = $this->db->query("SELECT (SELECT COUNT(gender) FROM dataset WHERE gender = 'm' AND CLASS = 'yes') M_AUTIS,
        (SELECT COUNT(gender) FROM dataset WHERE gender = 'f' AND CLASS = 'yes') F_AUTIS,
        (SELECT COUNT(gender) FROM dataset WHERE gender = 'm' AND CLASS = 'no') M_NORMAL,
        (SELECT COUNT(gender) FROM dataset WHERE gender = 'f' AND CLASS = 'no') F_NORMAL");
        return $query->result_array();
    }

    function getAge()
    {
        $query = $this->db->query("SELECT p.age age, normal, autis
        FROM   (SELECT COUNT(age) AS normal, age
            FROM dataset
                WHERE age NOT IN (0)
                AND CLASS = 'no'
                GROUP BY age) p
        JOIN   (SELECT COUNT(age) AS autis, age
                FROM dataset
                WHERE age NOT IN (0)
                AND CLASS = 'yes'
                 GROUP BY age) s ON p.age = s.age");
        return $query->result_array();
    }
    function getJundice()
    {
        $query = $this->db->query("SELECT (SELECT COUNT(jundice) FROM dataset WHERE jundice = 'yes' AND CLASS = 'no')  Y_normal,
        (SELECT COUNT(jundice) FROM dataset WHERE jundice = 'yes' AND CLASS = 'yes') Y_autism,
        
        (SELECT COUNT(jundice) FROM dataset WHERE jundice = 'no' AND CLASS = 'no') N_normal,
        (SELECT COUNT(jundice) FROM dataset WHERE jundice = 'no' AND CLASS = 'yes') N_autism");
        return $query->result_array();
    }
    function getAutisTree()
    {
        $query = $this->db->query("SELECT (SELECT COUNT(autism) FROM dataset WHERE autism = 'yes' AND CLASS = 'no')  Y_normal,
        (SELECT COUNT(autism) FROM dataset WHERE autism = 'yes' AND CLASS = 'yes') Y_autism,
        
        (SELECT COUNT(autism) FROM dataset WHERE autism = 'no' AND CLASS = 'no') N_normal,
        (SELECT COUNT(autism) FROM dataset WHERE autism = 'no' AND CLASS = 'yes') N_autism");
        return $query->result_array();
    }
}
