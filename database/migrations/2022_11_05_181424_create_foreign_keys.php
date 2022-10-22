<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('flights', function(Blueprint $table) {
			$table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
			$table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
					
		}); 

		Schema::table('hajs', function(Blueprint $table) {
			$table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
			$table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
					
		}); 
		
		Schema::table('tickets', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('flight_id')->references('id')->on('flights')->onDelete('cascade');
			$table->foreign('services_id')->references('id')->on('services')->onDelete('cascade');			
		}); 
		Schema::table('payments', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
					
		}); 

	}

	public function down()
	{
		Schema::table('flights', function(Blueprint $table) {
			$table->dropForeign('flights_company_id_foreign');
			$table->dropForeign('flights_service_id_foreign');
		});
		Schema::table('hajs', function(Blueprint $table) {
			$table->dropForeign('flights_company_id_foreign');
			$table->dropForeign('flights_service_id_foreign');
			$table->dropForeign('tickets_user_id_foreign');
		});
		
		Schema::table('tickets', function(Blueprint $table) {
			$table->dropForeign('tickets_user_id_foreign');
			$table->dropForeign('tickets_flight_id_foreign');
			$table->dropForeign('tickets_services_id_foreign');
		});
		Schema::table('payments', function(Blueprint $table) {
			$table->dropForeign('payments_user_id_foreign');
			$table->dropForeign('payments_ticket_id_foreign');
			
		});
       
	}
}
