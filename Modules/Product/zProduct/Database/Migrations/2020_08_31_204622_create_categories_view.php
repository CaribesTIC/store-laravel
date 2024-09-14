<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   //DB::connection('pgsql_product')->unprepared("DROP VIEW public.view_categories;");
        DB::connection('pgsql_product')->unprepared("
            CREATE OR REPLACE VIEW public.view_categories AS 
                WITH RECURSIVE categories_recursive(id, name, family, parent_id, level, final, company_id) AS (
                    SELECT root.id,
                           root.name,
                           ''::character varying::text || root.name::text AS family,
                           root.parent_id,
                           1 AS level,
                           root.final,
                           root.company_id 
                        FROM categories root
                            WHERE root.parent_id = 0
                    UNION ALL
                    SELECT child.id,
                           child.name,
                           concat(concat(parent.family, ' / '), child.name) AS concat,
                           child.parent_id,
                           parent.level + 1 AS level,
                           child.final,
                           child.company_id 
                        FROM categories_recursive parent, categories child
                            WHERE parent.id = child.parent_id
                )
                SELECT categories_recursive.id,
                       categories_recursive.name,
                       categories_recursive.family,
                       categories_recursive.parent_id,
                       categories_recursive.level,
                       categories_recursive.final,
                       categories_recursive.company_id
                       FROM categories_recursive;
           ALTER TABLE public.view_categories
               OWNER TO postgres;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //DB::connection('pgsql_product')->unprepared("DROP VIEW public.view_categories;");
    }
}
