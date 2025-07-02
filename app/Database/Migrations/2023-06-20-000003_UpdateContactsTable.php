<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateContactsTable extends Migration
{
    public function up()
    {
        // Tambahkan kolom baru ke tabel contacts
        $fields = [
            'feedback_type' => [
                'type' => 'ENUM',
                'constraint' => ['suggestion', 'bug_report', 'question', 'content_improvement', 'other'],
                'default' => 'suggestion',
                'after' => 'message'
            ],
            'related_quiz' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'after' => 'feedback_type'
            ],
        ];

        $this->forge->addColumn('contacts', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('contacts', ['feedback_type', 'related_quiz']);
    }
}
