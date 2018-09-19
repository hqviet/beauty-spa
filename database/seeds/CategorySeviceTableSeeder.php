<?php

use Illuminate\Database\Seeder;

class CategorySeviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root = [
            [
                'slug' => 'massage',
                'status' => 1,
                'trans' => [
                    [
                        'lang' => 'vi',
                        'name' => 'MASSAGES',
                    ],
                    [
                        'lang' => 'en',
                        'name' => 'MASSAGES',
                    ]
                ],
            ],
            [
                'slug' => 'foot-hand',
                'status' => 1,
                'trans' => [
                    [
                        'lang' => 'vi',
                        'name' => 'TRỊ LIỆU CHÂN & TAY',
                    ],
                    [
                        'lang' => 'en',
                        'name' => 'FOOT & HAND RITUALS',
                    ]
                ],
            ],
            [
                'slug' => 'body-scrubs',
                'status' => 1,
                'trans' => [
                    [
                        'lang' => 'vi',
                        'name' => 'DỊCH VỤ SPA CHĂM SÓC CƠ THỂ',
                    ],
                    [
                        'lang' => 'en',
                        'name' => 'BODY SCRUBS & EXFOLIATION',
                    ]
                ],
            ],
            [
                'slug' => 'facials',
                'status' => 1,
                'trans' => [
                    [
                        'lang' => 'vi',
                        'name' => 'DỊCH VỤ SPA CHĂM SÓC DA MẶT',
                    ],
                    [
                        'lang' => 'en',
                        'name' => 'FACIALS',
                    ]
                ],
            ],
            [
                'slug' => 'beauti-rituals',
                'status' => 1,
                'trans' => [
                    [
                        'lang' => 'vi',
                        'name' => 'DỊCH VỤ LÀM ĐẸP',
                    ],
                    [
                        'lang' => 'en',
                        'name' => 'BEAUTY RITUALS',
                    ]
                ],
            ],
        ];

        foreach ($root as $r){
            $trans = $r['trans'];
            unset($r['trans']);
            $node = new \App\Models\CategoryService($r);
            $node->save();
            foreach ($trans as $t){
                $nt = new \App\Models\CategoryServiceTranslation();
                $nt->category_services_id = $node->id;
                $nt->lang = $t['lang'];
                $nt->name = $t['name'];
                $nt->save();
            }
        }
    }
}
