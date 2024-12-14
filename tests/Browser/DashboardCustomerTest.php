<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
//Aufar yang buat
class DashboardCustomerTest extends DuskTestCase
{
    /**
     *@group dashboard
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertPathIs('/login')
                    ->assertSee('Sign In')
                    ->type('email','aufar@gmail.com')
                    ->type('password','12345')
                    ->press('@submit')
                    ->assertPathIs('/pembayaranlaundry/customer')
                    ->clickLink('Dashboard')
                    ->assertPathIs('/dashboardcustomer/customer')
                    ->screenshot('dashboar_awal')
                    ->clickLink('Pembayaran Wifi')
                    ->assertPathIs('/dashboard/customer/pembayaranwifi')
                    ->press('@belipaket')
                    ->assertPathIs('/tambahWifi')
                    ->select('id_customer','3')
                    ->type('tanggal_tagihan','06/07/2024')
                    ->select('paket','10 Mbps')
                    ->press('@tambah')
                    ->assertPathIs('/dashboard/customer/pembayaranwifi')
                    ->clickLink('Dashboard')
                    ->assertPathIs('/dashboardcustomer/customer')
                    ->screenshot('dashboar_akhir')
            ;
        });
    }
}
