TYPE=VIEW
query=select `hoteldb`.`transactions`.`ID_TRANS` AS `id_trans`,`hoteldb`.`transactions`.`LIBELLE_TRANS` AS `libelle_trans`,`hoteldb`.`comptes`.`NUMERO_CPT` AS `numero_cpt`,`hoteldb`.`comptes`.`NOM_CPT` AS `nom_cpt`,`hoteldb`.`users`.`username` AS `username`,`hoteldb`.`transactions`.`DATE_TRANS` AS `jours` from (((`hoteldb`.`transactions` join `hoteldb`.`comptes` on((`hoteldb`.`transactions`.`ID_CPT` = `hoteldb`.`comptes`.`id_cpt`))) join `hoteldb`.`sous_chapitres` on((`hoteldb`.`comptes`.`ID_SCHAP` = `hoteldb`.`sous_chapitres`.`id_schap`))) join `hoteldb`.`users` on((`hoteldb`.`transactions`.`user_id` = `hoteldb`.`users`.`id`))) order by `hoteldb`.`transactions`.`ID_TRANS` desc
md5=ec490cae4177593d39b429973843fd08
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=1
with_check_option=0
timestamp=2017-11-24 15:32:17
create-version=1
source=select `transactions`.`ID_TRANS` AS `id_trans`,`transactions`.`LIBELLE_TRANS` AS `libelle_trans`,`comptes`.`NUMERO_CPT` AS `numero_cpt`,`comptes`.`NOM_CPT` AS `nom_cpt`,`users`.`username` AS `username`,`transactions`.`DATE_TRANS` AS `jours` from (((`transactions` join `comptes` on((`transactions`.`ID_CPT` = `comptes`.`id_cpt`))) join `sous_chapitres` on((`comptes`.`ID_SCHAP` = `sous_chapitres`.`id_schap`))) join `users` on((`transactions`.`user_id` = `users`.`id`))) order by `transactions`.`ID_TRANS` desc
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `hoteldb`.`transactions`.`ID_TRANS` AS `id_trans`,`hoteldb`.`transactions`.`LIBELLE_TRANS` AS `libelle_trans`,`hoteldb`.`comptes`.`NUMERO_CPT` AS `numero_cpt`,`hoteldb`.`comptes`.`NOM_CPT` AS `nom_cpt`,`hoteldb`.`users`.`username` AS `username`,`hoteldb`.`transactions`.`DATE_TRANS` AS `jours` from (((`hoteldb`.`transactions` join `hoteldb`.`comptes` on((`hoteldb`.`transactions`.`ID_CPT` = `hoteldb`.`comptes`.`id_cpt`))) join `hoteldb`.`sous_chapitres` on((`hoteldb`.`comptes`.`ID_SCHAP` = `hoteldb`.`sous_chapitres`.`id_schap`))) join `hoteldb`.`users` on((`hoteldb`.`transactions`.`user_id` = `hoteldb`.`users`.`id`))) order by `hoteldb`.`transactions`.`ID_TRANS` desc
