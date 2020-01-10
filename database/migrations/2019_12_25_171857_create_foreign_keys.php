<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('articles', function(Blueprint $table) {
			$table->foreign('type_article_id')->references('id')->on('type_articles')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('articles', function(Blueprint $table) {
			$table->foreign('add_by')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('ancien_maires', function(Blueprint $table) {
			$table->foreign('commune_info_id')->references('id')->on('commune_infos')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('procedures', function(Blueprint $table) {
			$table->foreign('categorie_id')->references('id')->on('categories')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('procedure_instances', function(Blueprint $table) {
			$table->foreign('procedure_id')->references('id')->on('procedures')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('procedure_instances', function(Blueprint $table) {
			$table->foreign('procedure_usager_id')->references('id')->on('procedure_usagers')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('procedure_instances', function(Blueprint $table) {
			$table->foreign('add_by')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('procedure_pieces', function(Blueprint $table) {
			$table->foreign('procedure_id')->references('id')->on('procedures')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('procedure_instance_pieces', function(Blueprint $table) {
			$table->foreign('procedure_instance_id')->references('id')->on('procedure_instances')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('procedure_instance_pieces', function(Blueprint $table) {
			$table->foreign('procedure_piece_id')->references('id')->on('procedure_pieces')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('ressources', function(Blueprint $table) {
			$table->foreign('secteur_id')->references('id')->on('secteurs')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('ressources', function(Blueprint $table) {
			$table->foreign('add_by')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('historique_contrats', function(Blueprint $table) {
			$table->foreign('agent_id')->references('id')->on('agents')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('historique_contrats', function(Blueprint $table) {
			$table->foreign('contrat_id')->references('id')->on('contrats')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('conges', function(Blueprint $table) {
			$table->foreign('agent_id')->references('id')->on('agents')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('cadre_concertations', function(Blueprint $table) {
			$table->foreign('collectivite_id')->references('id')->on('collectivites')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('cadre_concertations', function(Blueprint $table) {
			$table->foreign('add_by')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('membre_cadres', function(Blueprint $table) {
			$table->foreign('cadre_de_concertation_id')->references('id')->on('cadre_concertations')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('sondages', function(Blueprint $table) {
			$table->foreign('add_by')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('sondage_options', function(Blueprint $table) {
			$table->foreign('sondage_id')->references('id')->on('sondages')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('sondage_resultats', function(Blueprint $table) {
			$table->foreign('sondage_id')->references('id')->on('sondages')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('sondage_resultats', function(Blueprint $table) {
			$table->foreign('sondage_option_id')->references('id')->on('sondage_options')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('panel_commentaires', function(Blueprint $table) {
			$table->foreign('panel_id')->references('id')->on('panel')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('articles', function(Blueprint $table) {
			$table->dropForeign('articles_type_article_id_foreign');
		});
		Schema::table('articles', function(Blueprint $table) {
			$table->dropForeign('articles_add_by_foreign');
		});
		Schema::table('ancien_maires', function(Blueprint $table) {
			$table->dropForeign('ancien_maires_commune_info_id_foreign');
		});
		Schema::table('procedures', function(Blueprint $table) {
			$table->dropForeign('procedures_categorie_id_foreign');
		});
		Schema::table('procedure_instances', function(Blueprint $table) {
			$table->dropForeign('procedure_instances_procedure_id_foreign');
		});
		Schema::table('procedure_instances', function(Blueprint $table) {
			$table->dropForeign('procedure_instances_procedure_usager_id_foreign');
		});
		Schema::table('procedure_instances', function(Blueprint $table) {
			$table->dropForeign('procedure_instances_add_by_foreign');
		});
		Schema::table('procedure_pieces', function(Blueprint $table) {
			$table->dropForeign('procedure_pieces_procedure_id_foreign');
		});
		Schema::table('procedure_instance_pieces', function(Blueprint $table) {
			$table->dropForeign('procedure_instance_pieces_procedure_instance_id_foreign');
		});
		Schema::table('procedure_instance_pieces', function(Blueprint $table) {
			$table->dropForeign('procedure_instance_pieces_procedure_piece_id_foreign');
		});
		Schema::table('ressources', function(Blueprint $table) {
			$table->dropForeign('ressources_secteur_id_foreign');
		});
		Schema::table('ressources', function(Blueprint $table) {
			$table->dropForeign('ressources_add_by_foreign');
		});
		Schema::table('historique_contrats', function(Blueprint $table) {
			$table->dropForeign('historique_contrats_agent_id_foreign');
		});
		Schema::table('historique_contrats', function(Blueprint $table) {
			$table->dropForeign('historique_contrats_contrat_id_foreign');
		});
		Schema::table('conges', function(Blueprint $table) {
			$table->dropForeign('conges_agent_id_foreign');
		});
		Schema::table('cadre_concertations', function(Blueprint $table) {
			$table->dropForeign('cadre_concertations_collectivite_id_foreign');
		});
		Schema::table('cadre_concertations', function(Blueprint $table) {
			$table->dropForeign('cadre_concertations_add_by_foreign');
		});
		Schema::table('membre_cadres', function(Blueprint $table) {
			$table->dropForeign('membre_cadres_cadre_de_concertation_id_foreign');
		});
		Schema::table('sondages', function(Blueprint $table) {
			$table->dropForeign('sondages_add_by_foreign');
		});
		Schema::table('sondage_options', function(Blueprint $table) {
			$table->dropForeign('sondage_options_sondage_id_foreign');
		});
		Schema::table('sondage_resultats', function(Blueprint $table) {
			$table->dropForeign('sondage_resultats_sondage_id_foreign');
		});
		Schema::table('sondage_resultats', function(Blueprint $table) {
			$table->dropForeign('sondage_resultats_sondage_option_id_foreign');
		});
		Schema::table('panel_commentaires', function(Blueprint $table) {
			$table->dropForeign('panel_commentaires_panel_id_foreign');
		});
	}
}
