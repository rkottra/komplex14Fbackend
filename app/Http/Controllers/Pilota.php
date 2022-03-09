<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Pilota extends Controller
{
    
    public function __construct() {
        //$this->middleware('auth');
    }

    public function getPilotak() {
        return DB::select("SELECT versenyzok.ID, versenyzok.nev, versenyzok.nemzet, versenyzok.magassag,
                                versenyzok.szuletes, csapatok.csapatID, 
                                csapatok.csapatnev, csapatok.nemzet AS 'csapatnemzet'
                            FROM versenyzok 
                            INNER JOIN csapatok ON csapatok.csapatId = versenyzok.csapat");
    }

    public function deletePilota( $id ) {
        return DB::delete("DELETE FROM versenyzok WHERE ID = ?", array($id));
    }

    public function insertPilota( Request $request ) {
        $pilota = $request->all();

        return DB::insert("INSERT INTO versenyzok(nev, nemzet, magassag, szuletes, csapat)
                            VALUE (?, ?, ?, ?, ?)", array(
                                    $pilota["nev"], $pilota["nemzet"], $pilota["magassag"], 
                                    date("Y-m-d", strtotime($pilota["szuletes"])), 
                                    $pilota["csapat"]["ID"])
                                );
    }

    public function updatePilota( $id, Request $request ) {
        $pilota = $request->all();

        return DB::update("UPDATE versenyzok SET nev = ?, nemzet = ?, magassag= ?, 
                                szuletes= ?, csapat = ?
                            WHERE id = ?", array(
                                    $pilota["nev"], $pilota["nemzet"], $pilota["magassag"], 
                                    date("Y-m-d", strtotime($pilota["szuletes"])), 
                                    $pilota["csapat"]["ID"], $id)
                                );
    }

    public function getToken() {
        return csrf_token();
    }
}
