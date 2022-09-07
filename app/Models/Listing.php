<?php  
        namespace App\Models;

use PhpParser\Node\Stmt\Static_;

        class Listing {
                public static function all(){
                        return [
                                        [
                                                "id"=>1,
                                                "title"=>"First List",
                                                "desc"=>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum quidem dicta dolore hic expedita mollitia porro ipsam, modi, debitis odit magnam a quia reiciendis fugiat ducimus delectus. Voluptatum, saepe fuga.,"
                                        ],
                                        [
                                                "id"=>2,
                                                "title"=>"Second List",
                                                "desc"=>"Rorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum quidem dicta dolore hic expedita mollitia porro ipsam, modi, debitis odit magnam a quia reiciendis fugiat ducimus delectus. Voluptatum, saepe fuga.,"
                                        ]
                                ];
                }

                public static function find($id){
                        $listings=self::all();
                        
                        foreach($listings as $item){
                                if($item["id"]==$id){
                                        return $item;
                                }
                        }
                }
        }
?> 