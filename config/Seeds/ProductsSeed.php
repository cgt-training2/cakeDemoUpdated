<?php
use Phinx\Seed\AbstractSeed;

/**
 * Products seed.
 */
class ProductsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {

        // [
        //       'project_id'      => $projects['ProjectA'],
        //       'name'            => 'TaskA',
        //       'description'     => '',
        //       'created'         => date('Y-m-d H:i:s'),
        //       'modified'        => date('Y-m-d H:i:s'),
        //   ],
        $data = [
                    [  'id' => 'Abc1',
                       'name' => 'Vaibhav', 
                       'description' => 'This is a products table', 
                       'created' => '2016-05-13 13:06:18',
                       'modified' => '2016-05-13 13:06:18'
                    ],
                    [  'id' => 'Abc2',
                       'name' => 'Vaibhav1', 
                       'description' => 'This is a products table', 
                       'created' => '2016-05-13 13:06:18',
                       'modified' => '2016-05-13 13:06:18'
                    ],
                    [  'id' => 'Abc3',
                       'name' => 'Vaibhav1', 
                       'description' => 'This is a products table', 
                       'created' => '2016-05-13 13:06:18',
                       'modified' => '2016-05-13 13:06:18'
                    ],

                ];

        $table = $this->table('products');
        $table->insert($data)->save();
    }
}
