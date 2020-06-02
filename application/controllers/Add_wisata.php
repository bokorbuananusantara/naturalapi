<?php

class Moota extends CI_Controller{

	function addWisata(){
		
		$notelp = $this->input->post('no_telp');
		$namaWisata = $this->input->post('nama_wisata');
		$deskripsi = $this->input->post('deskripsi');
		$alamat = $this->input->post('alamat');
		$latitude = $this->input->post('latitude');
		$longitude = $this->input->post('longitude');
		$tanggal = $this->input->post('tanggal');
		$id_poto = $this->input->post('id_poto');
		$wisata = time(); 

		//proses upload
		if(move_uploaded_file($_FILES["files"]["tmp_name"], "./asset/poto/".$wisata.'.jpg')){

			//prepare for data
			$dataInsert =['id_wisata' => $wisata,
			'no_telp' => $notelp,
			'nama_wisata' => $namaWisata,
			'deskripsi' => $deskripsi,
			'alamat' => $alamat,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'tanggal' => $tanggal,
			'id_poto' => $id_poto,
			];

		$wis = $this->crud->insert('wisata', $dataInsert);

			$dataFoto = ['foto' => $wisata.'.jpg', 'tanggal' => $tanggal, 'id_wisata' => $wisata];

			$foto = $this->crud->insert('foto', $dataFoto);

			if ($wis == true && $foto == true ){
				echo json_encode(['message' => 'insert data berhasil', 'code' => 200]);
			}else{
				echo json_encode(['message' => 'terjadi kesalahan', 'code' => 500]);
			}

		}else{
			echo json_encode(['message' => 'upload gagal', 'code' => 500]);
		}


	}

}

?>