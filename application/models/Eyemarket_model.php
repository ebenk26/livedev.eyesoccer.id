<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eyemarket_model extends CI_Model
{
//membaca tabel database
        public function listing(){
            $this->db->select('tbl_category_product.*,category_product_name');
            $this->db->from('tbl_category_product');
            //relasi
            $this->db->join('tbl_category_product','tbl_category_product.id_category_product = tbl_product.id_product','left');
            $this->db->join('admin','admin.admin_id = tbl_product.id_product','left');
            //end relasi
            $this->db->order_by('id_product','DESC limit 4');
            $query=$this->db->get();
            return $query->result ();
        }

    public function get_admin($id)
    {
        $query = $this->db->query(" SELECT
                                        A.*
                                    FROM
                                        eyemarket_admin A
                                    WHERE 
                                        A.id = '$id'
                                        ")->result_array();
        return $query;
    }

    public function get_all_product_admin()
    {
        $query = $this->db->query(" SELECT
                                        A.id_product,
                                        A.id_parent_cat,
                                        A.id_kategori,
                                        A.id_toko,
                                        A.nama,
                                        A.title_slug,
                                        A.harga_sebelum,
                                        A.harga,
                                        A.diskon,
                                        A.stok,
                                        A.berat,
                                        A.keterangan,
                                        A.ongkir,
                                        A.status_publish,
                                        A.created_date,
                                        B. nama as toko,
                                        C. nama as kategori,
                                        E.id as id_image,
                                        E.image1,
                                        E.image2,
                                        E.image3,
                                        E.image4,
                                        E.image5,
                                        F.nama as nama_region
                                    FROM
                                        eyemarket_product A
                                    LEFT JOIN 
                                        eyemarket_toko B on A.id_toko = B.id
                                    INNER JOIN
                                        eyemarket_category C on A.id_kategori = C.id
                                    LEFT JOIN
                                        eyemarket_size D on A.id_product = D.id_product
                                    LEFT JOIN
                                        eyemarket_images E on A.id_product =  E.id_product
                                    INNER JOIN
                                        eyemarket_parent_cat F on A.id_parent_cat = F.id
                                    WHERE
                                        A.status_publish != 2
                                    ORDER BY 
                                        A.id_product DESC
                                        ")->result_array();
            return $query; 
    }

    public function get_all_product()
    {
        $query = $this->db->query(" SELECT
                                        A.id_product,
                                        A.id_kategori,
                                        A.id_toko,
                                        A.nama,
                                        A.title_slug,
                                        A.harga_sebelum,
                                        A.harga,
                                        A.diskon,
                                        A.status_publish,
                                        A.created_date,
                                        B. nama as toko,
                                        C. nama as kategori,
                                        E.id as id_image,
                                        E.image1,
                                        F.nama as nama_region
                                    FROM
                                        eyemarket_product A
                                    LEFT JOIN 
                                        eyemarket_toko B on A.id_toko = B.id
                                    INNER JOIN
                                        eyemarket_category C on A.id_kategori = C.id
                                    LEFT JOIN
                                        eyemarket_images E on A.id_product =  E.id_product
                                    INNER JOIN
                                        eyemarket_parent_cat F on A.id_kategori = F.id
                                    WHERE
                                        status_publish = 1
                                    ORDER BY 
                                        A.id_product DESC
                                        ")->result_array();
            return $query; 
    }

    public function get_all_kategori()
    {
        $query = $this->db->query(" SELECT
                                        *
                                    FROM
                                        eyemarket_category
                                        ")->result_array();
        return $query; 
    }

    public function get_all_parent_kategori()
    {
        $query = $this->db->query(" SELECT
                                        *
                                    FROM
                                        eyemarket_parent_cat
                                        ")->result_array();
        return $query; 
    }

    public function get_all_toko()
    {
        $query = $this->db->query(" SELECT
                                        *
                                    FROM
                                        eyemarket_toko
                                        ")->result_array();
        return $query; 
    }

    function tambah_produk($input)
    {
        $this->db->insert('eyemarket_product', $input);
        
        return $this->db->insert_id();
    }

    function tambah_image($input)
    {
        $this->db->insert('eyemarket_images', $input);
        
        return $this->db->insert_id();
    }

    function tambah_gambar($id,$object)
    {
        $query = $this->db->update('eyemarket_images', $object, array('id_product' => $id));
        
        return $query;
    }

    function tambah_size($data_size)
    {
        $this->db->insert('eyemarket_size', $data_size);
        
        return $this->db->insert_id();
    }

    function edit_produk($id,$input)
    {
        // $this->db->where('id_product', $id);
        // $this->db->update('eyemarket_product', $input);
        // $this->db->insert('eyemarket_product', $input);

        $query = $this->db->update('eyemarket_product', $input, array('id_product' => $id));

        return $query;
    }

    function delete_produk($id,$data)
    {
        $query = $this->db->update('eyemarket_product', $data, array('id_product' => $id));
        return $query;
    }

    function enable_produk($id,$data)
    {
        $query = $this->db->update('eyemarket_product', $data, array('id_product' => $id));
        return $query;
    }

    function disable_produk($id,$data)
    {
        $query = $this->db->update('eyemarket_product', $data, array('id_product' => $id));
        return $query;
    }

    public function get_id_product($title_slug)
    {
        $this->db->select('id_product');
        $query = $this->db->get_where('eyemarket_product', array('title_slug' => $title_slug))->row();
        return $query; 
    }

    public function get_product($id_product)
    {
        $query = $this->db->query(" SELECT
                                        A.id_product,
                                        A.id_kategori,
                                        A.id_toko,
                                        A.nama,
                                        A.title_slug,
                                        A.harga_sebelum,
                                        A.harga,
                                        A.diskon,
                                        A.stok,
                                        A.berat,
                                        A.keterangan,
                                        A.ongkir,
                                        A.status_publish,
                                        A.created_date,
                                        B. nama as toko,
                                        C. nama as kategori,
                                        D.id,
                                        D.S,
                                        D.M,
                                        D.L,
                                        D.XL,
                                        D.XXL,
                                        D.XXXL,
                                        D.custom,
                                        E.id as id_image,
                                        E.image1,
                                        E.image2,
                                        E.image3,
                                        E.image4,
                                        E.image5
                                    FROM
                                        eyemarket_product A
                                    LEFT JOIN 
                                        eyemarket_toko B        on A.id_toko = B.id
                                    INNER JOIN
                                        eyemarket_category C    on A.id_kategori = C.id
                                    LEFT JOIN
                                        eyemarket_size D        on A.id_product = D.id_product
                                    LEFT JOIN
                                        eyemarket_images E      on A.id_product =  E.id_product
                                    WHERE
                                        A.id_product = '$id_product'
                                        AND
                                        status_publish != 2
                                    ORDER BY 
                                        A.id_product DESC
                                        ")->result_array();
            return $query; 
    }

    public function get_product_lain($id_product)
    {
        $query = $this->db->query(" SELECT
                                        A.*,
                                        B.image1,
                                        C.nama as toko
                                    FROM
                                        eyemarket_product A
                                    LEFT JOIN
                                        eyemarket_images B on B.id_product = A.id_product
                                    LEFT JOIN
                                        eyemarket_toko C on C.id = A.id_toko
                                    WHERE
                                        A.id_product != '$id_product'
                                        AND
                                        A.status_publish = 1
                                    LIMIT
                                        4
                                        ")->result_array();
        return $query; 
    }

    public function add_keranjang($data)
    {
        $this->db->insert('eyemarket_keranjang', $data);
        
        return $this->db->insert_id();
    }

    public function get_keranjang($id_member)
    { 
        $query = $this->db->query(" SELECT
                                        A.*,
                                        B.nama,
                                        B.title_slug,
                                        B.harga_sebelum,
                                        B.harga,
                                        B.diskon,
                                        B.berat,
                                        B.keterangan,
                                        C.nama as toko,
                                        E.id as id_image,
                                        E.image1,
                                        E.image2,
                                        E.image3,
                                        E.image4,
                                        E.image5,
                                        F.nama as nama_rumah,
                                        F.kode,
                                        F.alamat
                                    FROM
                                        eyemarket_keranjang A
                                    LEFT JOIN
                                        eyemarket_product B     on B.id_product = A.id_product
                                    LEFT JOIN
                                        eyemarket_toko C        on C.id = B.id_toko
                                    LEFT JOIN
                                        eyemarket_images E      on A.id_product =  E.id_product
                                    LEFT JOIN
                                        eyemarket_address F      on A.id_alamat =  F.id
                                    WHERE 
                                        A.id_member = '$id_member'
                                        AND
                                        A.status = 0
                                    ORDER BY
                                        A.id ASC
                                        ")->result_array();
        return $query;
    }

    public function get_count_keranjang($id_member)
    {
        $query = $this->db->query(" SELECT
                                        count(id) as jumlah
                                    FROM
                                        eyemarket_keranjang
                                    WHERE
                                        id_member = '$id_member'
                                        AND
                                        status = 0
                                        ")->row();
        return $query;
    }

    public function get_total_harga($id_member)
    { 
        $query = $this->db->query(" SELECT
                                        sum(total) as total_all
                                    FROM
                                        eyemarket_keranjang
                                    WHERE
                                        id_member = '$id_member'
                                        AND
                                        status = 0
                                        ")->row();
        return $query;
    }

    public function get_total_berat($id_member)
    { 
        $query = $this->db->query(" SELECT
                                        sum(berat) as berat_all
                                    FROM
                                        eyemarket_keranjang
                                    WHERE
                                        id_member = '$id_member'
                                        AND
                                        status = 0
                                        ")->row();
        return $query;
    }

    public function edit_keranjang($data,$id_keranjang)
    {;
        $query = $this->db->update('eyemarket_keranjang', $data, array('id' => $id_keranjang, 'status' => '0'));
        
        return $query;
    }

    public function edit_catatan($data,$id_keranjang)
    {;
        $query = $this->db->update('eyemarket_keranjang', $data, array('id' => $id_keranjang, 'status' => '0'));
        
        return $query;
    }

    public function delete_keranjang($id)
    {
        $this->db->delete('eyemarket_keranjang', array('id' => $id));

        return TRUE;
    }

    public function get_member($id_member)
    {
        $query = $this->db->query(" SELECT
                                        A.*
                                    FROM
                                        tbl_member A
                                    WHERE 
                                        A.id_member = '$id_member'
                                        ")->result_array();
        return $query;
    }

    public function get_address($id_member)
    { 
        $query = $this->db->query(" SELECT
                                        *
                                    FROM
                                        eyemarket_address
                                    WHERE
                                        id_member = '$id_member'
                                    ")->result_array();
        return $query;
    }

    public function tambah_address($input)
    {
        $this->db->insert('eyemarket_address', $input);
        
        return $this->db->insert_id();
    }

    public function update_cart_address($id_member,$data)
    {
        $query = $this->db->update('eyemarket_keranjang', $data, array('id_member' => $id_member, 'status' => '0'));
        
        return $query;
    }

    public function update_order_address($id_member,$data)
    {
        $query = $this->db->update('eyemarket_order', $data, array('id_member' => $id_member, 'status' => '0'));
        
        return $query;
    }

    public function update_cart_delivery($id_member,$data)
    {
        $query = $this->db->update('eyemarket_keranjang', $data, array('id_member' => $id_member, 'status' => '0'));
        
        return $query;
    }

    public function update_order_delivery($id_member,$data)
    {
        $query = $this->db->update('eyemarket_order', $data, array('id_member' => $id_member, 'status' => '0'));
        
        return $query;
    }

    public function update_cart_payment($id_member,$data)
    {
        $query = $this->db->update('eyemarket_keranjang', $data, array('id_member' => $id_member, 'status' => '0'));
        
        return $query;
    }

    public function update_order_payment($id_member,$data)
    {
        $query = $this->db->update('eyemarket_order', $data, array('id_member' => $id_member, 'status' => '0'));
        
        return $query;
    }

    public function get_review_order($id_member)
    {
        $query = $this->db->query(" SELECT
                                        A.id,
                                        A.no_order,
                                        A.no_urut,
                                        A.ongkir,
                                        A.harga_all,
                                        A.berat_all,
                                        B.id,
                                        B.id_product,
                                        B.jumlah,
                                        B.total,
                                        B.catatan,
                                        C.nama as nama_alamat,
                                        C.penerima as nama_penerima,
                                        C.alamat,
                                        C.hp,
                                        D.nama as kurir,
                                        E.nama,
                                        E.title_slug,
                                        E.diskon,
                                        E.harga,
                                        E.berat,
                                        F.nama as toko,
                                        G.image1
                                    FROM
                                        eyemarket_order A
                                    LEFT JOIN
                                        eyemarket_keranjang B   ON A.id     = B.id_order
                                    LEFT JOIN
                                        eyemarket_address C     ON C.id     = A.id_alamat
                                    LEFT JOIN
                                        eyemarket_kurir D       ON D.id     = A.id_kurir
                                    LEFT JOIN
                                        eyemarket_product E ON E.id_product = B.id_product
                                    LEFT JOIN
                                        eyemarket_toko F    ON F.id = E.id_toko
                                    LEFT JOIN
                                        eyemarket_images G ON B.id_product = G.id_product
                                    WHERE
                                        A.status = 0
                                        AND
                                        A.id_member = '$id_member'
                                        ")->result_array();
        return $query;
        
    }

    public function get_harga_satuan($id_keranjang)
    { 
        $query = $this->db->query(" SELECT
                                        A.harga
                                    FROM
                                        eyemarket_product A
                                    LEFT JOIN
                                        eyemarket_keranjang B on B.id_product = A.id_product 
                                    WHERE
                                        B.id = '$id_keranjang'
                                        ")->row();
        return $query;
    }

    public function get_berat($id_keranjang)
    { 
        $query = $this->db->query(" SELECT
                                        A.berat
                                    FROM
                                        eyemarket_product A
                                    LEFT JOIN
                                        eyemarket_keranjang B on B.id_product = A.id_product 
                                    WHERE
                                        B.id = '$id_keranjang'
                                        ")->row();
        return $query;
    }

    public function set_order($object)
    {
        $this->db->insert('eyemarket_order', $object);
        
        return $this->db->insert_id();
    }

    public function get_order($id = NULL,$id_member = NULL)
    { 
        if ($id != NULL && $id_member == NULL)
        {
            $query = $this->db->query(" SELECT
                                        A.*,
                                        B.bank,
                                        B.nama_pemilik,
                                        B.rekening,
                                        B.logo
                                    FROM
                                        eyemarket_order A
                                    INNER JOIN
                                        eyemarket_payment B on B.id = A.id_tipe_bayar
                                    WHERE
                                        A.id = '$id'
                                        ")->row();
        }
        else
        if ($id == NULL && $id_member != NULL)
        {
            $query = $this->db->query(" SELECT
                                            A.*,
                                            B.bank,
                                            B.nama_pemilik,
                                            B.rekening,
                                            B.logo
                                        FROM
                                            eyemarket_order A
                                        INNER JOIN
                                            eyemarket_payment B on B.id = A.id_tipe_bayar
                                        WHERE
                                            A.id_member = '$id_member'
                                        AND
                                            A.status = 0
                                            ")->row();
        }
        
        return $query;
    }

    public function get_max_nourut($id_member)
    {
        $query = $this->db->query(" SELECT
                                        MAX(A.no_urut) AS max_urut
                                    FROM
                                        eyemarket_order A 
                                    WHERE
                                        A.id_member = '$id_member'
                                        ")->row();
        return $query;
    }

    function set_keranjang_status($id_order,$cart)
    {
        $query = $this->db->update('eyemarket_keranjang', $cart, array('id_order' => $id_order));
        
        return $query;
    }

    function set_order_status($id_order,$object)
    {
        $query = $this->db->update('eyemarket_order', $object, array('id' => $id_order));
        
        return $query;
    }

    public function get_invoice($no_order)
    { 
        $query = $this->db->query(" SELECT
                                        A.*,
                                        D.nama as toko,
                                        D.hp,
                                        D.email,
                                        D.alamat,
                                        E.nama as kurir,
                                        G.name as username,
                                        H.penerima,
                                        H.alamat,
                                        H.provinsi as provinsinya,
                                        H.kota,
                                        H.kecamatan
                                    FROM
                                        eyemarket_order A
                                    LEFT JOIN
                                        eyemarket_keranjang B   on B.id_order = A.id
                                    LEFT JOIN
                                        eyemarket_product C     on C.id_product = B.id_product
                                    LEFT JOIN
                                        eyemarket_toko D        on D.id = C.id_toko
                                    LEFT JOIN
                                         eyemarket_kurir E      on E.id = A.id_kurir
                                    LEFT JOIN
                                        tbl_member G            on A.id_member =  G.id_member
                                    LEFT JOIN
                                        eyemarket_address H     on A.id_alamat =  H.id
                                    WHERE
                                        A.no_order = '$no_order'
                                    LIMIT
                                        1
                                        ")->row();
        return $query;
    }

    public function get_keranjang_invoice($id_order)
    { 
        $query = $this->db->query(" SELECT
                                        A.*,
                                        B.nama,
                                        B.title_slug,
                                        B.harga_sebelum,
                                        B.harga,
                                        B.diskon,
                                        B.berat,
                                        B.keterangan,
                                        C.nama as toko,
                                        F.nama as nama_rumah
                                    FROM
                                        eyemarket_keranjang A
                                    LEFT JOIN
                                        eyemarket_product B         on B.id_product = A.id_product
                                    LEFT JOIN
                                        eyemarket_toko C            on C.id = B.id_toko
                                    LEFT JOIN
                                        eyemarket_address F         on A.id_alamat =  F.id
                                    WHERE 
                                        A.id_order = '$id_order'
                                    ORDER BY
                                        A.id ASC
                                        ")->result_array();
        return $query;
    }

    public function update_member($id_member,$data)
    {
        $query = $this->db->update('tbl_member', $data, array('id_member' => $id_member));

        return $query;
    }

    public function get_pesanan($id_member)
    {
        $query = $this->db->query(" SELECT
                                        A.*
                                    FROM
                                        eyemarket_order A
                                    WHERE
                                        A.id_member = '$id_member'
                                        ")->result_array();
        return $query;
    }

    public function get_all_provinsi()
    {
        $this->db->select('provinsi');
        $this->db->group_by('provinsi');
        $query = $this->db->get('eyemarket_destinasi')->result_array();

        return $query;
    }

    public function get_kota($prov)
    {
        $query = $this->db->query(" SELECT
                                        A.kota
                                    FROM
                                        eyemarket_destinasi A
                                    WHERE
                                        A.provinsi = '$prov'
                                        AND
                                        A.kota != 'DKI JAKARTA'
                                    GROUP BY
                                        A.kota
                                        ")->result_array();
        return $query;
    }

    public function get_kecamatan($kota)
    {
        $query = $this->db->query(" SELECT
                                        A.kecamatan
                                    FROM
                                        eyemarket_destinasi A
                                    WHERE
                                        A.kota = '$kota'
                                    GROUP BY
                                        A.kecamatan
                                        ")->result_array();
        return $query;
    }

    public function get_kode_jne($kota,$kecamatan)
    {
        $query = $this->db->query(" SELECT
                                        A.kode
                                    FROM
                                        eyemarket_destinasi A
                                    WHERE
                                        A.kota = '$kota'
                                        AND
                                        A.kecamatan = '$kecamatan'
                                        ")->row();
        return $query;
    }

    public function get_all_bank()
    {
        $query  = $this->db->get('eyemarket_payment')->result_array();

        return $query;
    }

    function set_konfirmasi($objek)
    {
        $this->db->insert('eyemarket_konfirmasi', $objek);
        
        return $this->db->insert_id();
    }

    function get_all_order()
    {
        $query = $this->db->query(" SELECT
                                        A.*,
                                        B.fullname,
                                        C.nama,
                                        D.bukti,
                                        D.created_date
                                    FROM
                                        eyemarket_order A
                                    LEFT JOIN
                                         tbl_member B   ON B.id_member = A.id_member
                                    LEFT JOIN
                                         eyemarket_kurir C  ON C.id = A.id_kurir
                                    LEFT JOIN
                                         eyemarket_konfirmasi D     ON D.id_order = A.no_order
                                    WHERE
                                        A.status != 0
                                    ORDER BY
                                         A.id DESC
                                        ")->result_array();
        return $query;
    }

    function set_status_lunas($id,$objek)
    {
        $query = $this->db->update('eyemarket_order', $objek, array('id' => $id));
        
        return $query;
    }

}