<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MobilModel;
use App\BookingModel;

class MainController extends Controller
{
    function index()
    {
        $iduser = session()->get('iduser');
        if (empty($iduser)) {
            return view('sign.in');
        }
        else {
            $mobil = MobilModel::GetMobil();
            return view('dashboard.index', [
                'title' => 'Dashboard',
                'path' => 'home',
                'ctr' => 'all',
                'mobil' => $mobil
            ]);
        }
    }
    function dashboard($ctr)
    {
        $iduser = session()->get('iduser');
        if (empty($iduser)) {
            return view('sign.in');
        }
        else {
            $mobil = MobilModel::GetMobilStatus($ctr);
            return view('dashboard.index', [
                'title' => 'Dashboard',
                'path' => 'home',
                'ctr' => $ctr,
                'mobil' => $mobil
            ]);
        }
    }
    function car()
    {
        $iduser = session()->get('iduser');
        if (empty($iduser)) {
            return redirect('/');
        }
        else {
            $mobil = MobilModel::GetMobil();
            return view('car.index', [
                'title' => 'Car',
                'path' => 'car',
                'ctr' => 'all',
                'mobil' => $mobil
            ]);
        }
    }
    function otherCar($ctr)
    {
        $iduser = session()->get('iduser');
        if (empty($iduser)) {
            return redirect('/');
        }
        else {
            $mobil = MobilModel::GetMobilStatus($ctr);
            return view('car.index', [
                'title' => 'Car',
                'path' => 'car',
                'ctr' => $ctr,
                'mobil' => $mobil
            ]);
        }
    }
    function addCar()
    {
        $iduser = session()->get('iduser');
        if (empty($iduser)) {
            return redirect('/');
        }
        else {
            return view('car.add', ['title' => 'Add Car', 'path' => 'add']);
        }
    }
    function editCar($id)
    {
        $iduser = session()->get('iduser');
        if (empty($iduser)) {
            return redirect('/');
        }
        else {
            $mobil = MobilModel::GetDetailMobil($id);
            return view('car.edit', ['title' => 'Edit Car', 'path' => 'none', 'mobil' => $mobil]);
        }
    }
    function detailCar($id)
    {
        $iduser = session()->get('iduser');
        if (empty($iduser)) {
            return redirect('/');
        }
        else {
            $mobil = MobilModel::GetDetailMobil($id);
            return view('car.detail', ['title' => 'Detail Car', 'path' => 'none', 'mobil' => $mobil]);
        }
    }
    function booking()
    {
        $iduser = session()->get('iduser');
        if (empty($iduser)) {
            return redirect('/');
        }
        else {
            $booking = BookingModel::GetDataPenyewa();
            return view('booking.index', ['title' => 'Booking', 'path' => 'booking', 'booking' => $booking]);
        }
    }
    function bookingDetail($id)
    {
        $iduser = session()->get('iduser');
        if (empty($iduser)) {
            return redirect('/');
        }
        else {
            $booking = BookingModel::GetDataPenyewaId($id);
            return view('booking.detail', ['title' => 'Booking', 'path' => 'booking', 'booking' => $booking]);
        }
    }
    function bookingEdit($id)
    {
        $iduser = session()->get('iduser');
        if (empty($iduser)) {
            return redirect('/');
        }
        else {
            $booking = BookingModel::GetDataPenyewaId($id);
            return view('booking.edit', ['title' => 'Booking', 'path' => 'booking', 'booking' => $booking]);
        }
    }
    function addBooking($id)
    {
        $iduser = session()->get('iduser');
        if (empty($iduser)) {
            return redirect('/');
        }
        else {
            $mobil = MobilModel::GetDetailMobil($id);
            return view('booking.add', ['title' => 'Add Booking', 'path' => 'none', 'mobil' => $mobil]);
        }
    }
    function transaction()
    {
        $iduser = session()->get('iduser');
        if (empty($iduser)) {
            return redirect('/');
        }
        else {
            $sewa = BookingModel::GetDataSewa();
            return view('transaction.index', ['title' => 'Transaction', 'path' => 'transaction', 'sewa' => $sewa]);
        }
    }
    function transactionDetail($id)
    {
        $iduser = session()->get('iduser');
        if (empty($iduser)) {
            return redirect('/');
        }
        else {
            $sewa = BookingModel::GetDataSewaId($id);
            return view('transaction.detail', [
                'title' => 'Transaction',
                'path' => 'transaction',
                'sewa' => $sewa
            ]);
        }
    }
    function transactionEdit($id)
    {
        $iduser = session()->get('iduser');
        if (empty($iduser)) {
            return redirect('/');
        }
        else {
            $sewa = BookingModel::GetDataSmallSewaId($id);
            return view('transaction.edit', [
                'title' => 'Transaction',
                'path' => 'transaction',
                'sewa' => $sewa
            ]);
        }
    }
}
