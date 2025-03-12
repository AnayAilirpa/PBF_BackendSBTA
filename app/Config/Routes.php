<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('Mahasiswa', 'Mahasiswa::index'); 
$routes->post('Mahasiswa', 'Mahasiswa::Proses_tambah_mahasiswa'); 
$routes->get('Mahasiswa/(:any)', 'Mahasiswa::Edit_data_mahasiswa/$1'); 
$routes->put('Mahasiswa/(:any)', 'Mahasiswa::Proses_edit_mahasiswa/$1'); 
$routes->delete('Mahasiswa/(:any)', 'Mahasiswa::Hapus_data_mahasiswa/$1'); 

$routes->get('Dosen', 'Dosen::index'); 
$routes->post('Dosen', 'Dosen::Proses_tambah_dosen'); 
$routes->get('Dosen/(:any)', 'Dosen::Edit_data_dosen/$1'); 
$routes->put('Dosen/(:any)', 'Dosen::Proses_edit_dosen/$1');
$routes->delete('Dosen/(:any)', 'Dosen::Hapus_data_dosen/$1'); 

$routes->get('Bimbingan', 'Bimbingan::index'); 
$routes->post('Bimbingan', 'Bimbingan::Proses_tambah_bimbingan'); 
$routes->get('Bimbingan/(:any)', 'Bimbingan::Edit_data_bimbingan/$1'); 
$routes->put('Bimbingan/(:any)', 'Bimbingan::Proses_edit_bimbingan/$1');
$routes->delete('Bimbingan/(:any)', 'Bimbingan::Hapus_data_bimbingan/$1'); 

$routes->get('TugasAkhir', 'TugasAkhir::index'); 
$routes->post('TugasAkhir', 'TugasAkhir::Proses_tambah_ta'); 
$routes->get('TugasAkhir/(:any)', 'TugasAkhir::Edit_data_ta/$1'); 
$routes->put('TugasAkhir/(:any)', 'TugasAkhir::Proses_edit_ta/$1');
$routes->delete('TugasAkhir/(:any)', 'TugasAkhir::Hapus_data_ta/$1'); 

$routes->get('User', 'User::index'); 
$routes->post('User', 'User::Proses_tambah_user'); 
$routes->get('User/(:any)', 'User::Edit_data_user/$1'); 
$routes->put('User/(:any)', 'User::Proses_edit_user/$1');
$routes->delete('User/(:any)', 'User::Hapus_data_user/$1');

$routes->get('View', 'View::index'); 


