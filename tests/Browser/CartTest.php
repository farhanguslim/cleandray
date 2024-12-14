<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CartTest extends DuskTestCase
{
    /**
     *@group cart
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
                    ->assertSee('Menu Makanan')
                    ->press('@beli-10')
                    ->assertPathIs('/dashboard/menumakanan/10')
                    ->assertSee('Teh Manis');
                    
                    $attempts = 0;
                    $maxAttempts = 5;
                    while ($attempts < $maxAttempts) {
                        try {
                            $browser->scrollTo('@submit')->click('@submit');
                            break;
                        } catch (\Exception $e) {
                            $attempts++;
                            $browser->pause(1000); 
                        }
                    }

                    if ($attempts == $maxAttempts) {
                        throw new \Exception('Failed to click submit button after multiple attempts');
                    }
        
            $browser->assertPathIs('/dashboard/customer/menumakanan')
                    ->press('@beli-12')
                    ->assertPathIs('/dashboard/menumakanan/12')
                    ->assertSee('Ayam Bakar');

                    $attempts = 0;
                    $maxAttempts = 5;
                    while ($attempts < $maxAttempts) {
                        try {
                            $browser->scrollTo('@submit')->click('@submit');
                            break;
                        } catch (\Exception $e) {
                            $attempts++;
                            $browser->pause(1000); 
                        }
                    }

                    if ($attempts == $maxAttempts) {
                        throw new \Exception('Failed to click submit button after multiple attempts');
                    }

            $browser->assertPathIs('/dashboard/customer/menumakanan')
                    ->click('@cart')
                    ->assertPathIs('/dashboard/customer/cart')
                    ->assertSee('Teh Manis')
                    ->assertSee('Ayam Bakar')
                    ->screenshot('CartAwal')
                    ->press('@delete')
                    ->screenshot('CartSetelahDelete')
                    ->press('@bayar')
                    ->assertSee('Pembayaran Makanan')
                    ->assertPathIs('/dashboard/customer/pembayaranmakanan')
                    ->attach('@inputgambar','C:\Users\aufar\Downloads\foto_woman11.jpg')
                    ->press('@submit')
                    ->assertPathIs('/dashboard/customer/terimakasih')
                    ->assertSee('Pembayaran Telah Berhasil')
                    ->screenshot('CartSelesai')
                ;
        });
    }
}
