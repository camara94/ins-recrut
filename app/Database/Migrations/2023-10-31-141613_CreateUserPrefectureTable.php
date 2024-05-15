<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserPrefectureTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
            ],
            'prefecture_id' => [
                'type' => 'INT',
            ],
            'etat' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            // 'content' => [
            //     'type' => 'TEXT',
            // ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('userprefectures');
    }

    public function down()
    {
        $this->forge->dropTable('userprefectures');
    }
}
