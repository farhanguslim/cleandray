<?php

namespace App\Http\Controllers;

use App\Models\{
    Pembayaran,
    PembayaranWifi,
    User,
};
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private function format_rupiah($number)
    {
        return 'Rp ' . number_format($number, 0, ',', '.');
    }
    public function index() {
        if (Auth::check()) {
            if (Auth::user()->auth == 'admin') {
                return redirect(route('dashboard', ['auth' => 'admin']));
            } else {
                return redirect(route('dashboard', ['auth' => 'customer']));
            }
        } else {
            return redirect("/login");
        }
    }

    public function dashboard() {
        if (Auth::check()) {
            if (Auth::user()->auth == 'admin') {
                $totalLaundry = Pembayaran::where('status_bukti', 1)->get()->sum(function ($payment) {
                    return intval(str_replace('.', '', $payment->total));
                });

                $totalUsers = User::where('auth', 'customer')->count();

                $totalPembayaran = $this->format_rupiah($totalLaundry);


                return view('pages.dashboard-admin', compact('totalUsers', 'totalPembayaran'));
            } else {
                return view('pages.dashboard-customer');
            }
        }
    }
    public function admin() {
        $totalLaundry = Pembayaran::where('status', 'lunas')->get()->sum(function ($payment) {
            return intval(str_replace('.', '', $payment->jumlah));
        });

        $totalUsers = User::count();

        $totalPembayaran = $this->format_rupiah($totalLaundry);


        return view('pages.dashboard-admin', compact('totalUsers', 'totalPembayaran'));

    }

    public function customer() {
        return redirect(route('pembayaran', ['auth' => 'customer']));
    }


}
