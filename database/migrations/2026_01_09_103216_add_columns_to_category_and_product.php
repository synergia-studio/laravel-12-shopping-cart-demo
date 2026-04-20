<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * Run the migrations.
     */    public function up(): void
     {

       if (Schema::hasTable('categories')) {

            Schema::table('categories', function (Blueprint $table) {
                $table->integer("created_user_id")->after('description')->default(0);
                $table->integer("updated_user_id")->after('created_at')->default(0);

                $table->string("browser_title")->after('description')->default("");
                $table->string("page_title")->after('browser_title')->default("");
                $table->string("seo_meta_title")->after('page_title')->default("");
                $table->string("seo_meta_subject")->after('seo_meta_title')->default("");
                $table->text("seo_meta_description")->after('seo_meta_subject');
                $table->text("seo_meta_keywords")->after('seo_meta_description');
            });
       };

       if (Schema::hasTable('products')) {

            Schema::table('products', function (Blueprint $table) {
                $table->integer("quantity")->after('name')->default(0);
                $table->float("price", 8, 2)->after('quantity')->default(0.00);

                $table->integer("created_user_id")->after('description')->default(0);
                $table->integer("updated_user_id")->after('created_at')->default(0);

                $table->string("browser_title")->after('description')->default("");
                $table->string("page_title")->after('browser_title')->default("");
                $table->string("seo_meta_title")->after('page_title')->default("");
                $table->string("seo_meta_subject")->after('seo_meta_title')->default("");
                $table->text("seo_meta_description")->after('seo_meta_subject');
                $table->text("seo_meta_keywords")->after('seo_meta_description');
            });
        };
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('created_user_id');
            $table->dropColumn('updated_user_id');

            $table->dropColumn('browser_title');
            $table->dropColumn('page_title');
            $table->dropColumn('seo_meta_title');
            $table->dropColumn('seo_meta_subject');
            $table->dropColumn('seo_meta_description');
            $table->dropColumn('seo_meta_keywords');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn("quantity");
            $table->dropColumn("price");

            $table->dropColumn("created_user_id");
            $table->dropColumn("updated_user_id");

            $table->dropColumn("browser_title");
            $table->dropColumn("page_title");
            $table->dropColumn("seo_meta_title");
            $table->dropColumn("seo_meta_subject");
            $table->dropColumn("seo_meta_description");
            $table->dropColumn("seo_meta_keywords");
        });
    }

};
