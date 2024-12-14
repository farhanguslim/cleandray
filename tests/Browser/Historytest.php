<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
//Aufar yang buat
class HistoryTest extends DuskTestCase
{
    /**
     *@group history
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
            ->clickLink('Menu Makanan')
            ->assertPathIs('/dashboard/customer/menumakanan')
            ->press('@beli-10')
            ->assertPathIs('/dashboard/menumakanan/10')
            ->scrollTo('@submit')->doubleClick('@submit')
            ->assertPathIs('/dashboard/customer/menumakanan')
            ->click('@cart')
            ->assertPathIs('/dashboard/customer/cart')
            ->press('@bayar')
            ->assertPathIs('/dashboard/customer/pembayaranmakanan')
            ->attach('@inputgambar','C:\Users\aufar\Downloads\foto_woman11.jpg')
            ->press('@submit')
            ->assertPathIs('/dashboard/customer/terimakasih')
            ->visit('dashboard/customer/order-history')
            ->assertSee('History Orders');
        });
    }
}
