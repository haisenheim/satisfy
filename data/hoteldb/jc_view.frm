TYPE=VIEW
query=select `hoteldb`.`transactions`.`ID_TRANS` AS `id_trans`,`hoteldb`.`transactions`.`MONTANT_TRANS` AS `depense` from ((`hoteldb`.`transactions` join `hoteldb`.`comptes` on((`hoteldb`.`transactions`.`ID_CPT` = `hoteldb`.`comptes`.`id_cpt`))) join `hoteldb`.`sous_chapitres` on((`hoteldb`.`comptes`.`ID_SCHAP` = `hoteldb`.`sous_chapitres`.`id_schap`))) where (`hoteldb`.`sous_chapitres`.`nature_schap` = 0)
md5=af171d68ed9b44df3e9b37be703b7be7
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=1
with_check_option=0
timestamp=2017-11-24 15:32:17
create-version=1
source=select `transactions`.`ID_TRANS` AS `id_trans`,`transactions`.`MONTANT_TRANS` AS `depense` from ((`transactions` join `comptes` on((`transactions`.`ID_CPT` = `comptes`.`id_cpt`))) join `sous_chapitres` on((`comptes`.`ID_SCHAP` = `sous_chapitres`.`id_schap`))) where (`sous_chapitres`.`nature_schap` = 0)
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `hoteldb`.`transactions`.`ID_TRANS` AS `id_trans`,`hoteldb`.`transactions`.`MONTANT_TRANS` AS `depense` from ((`hoteldb`.`transactions` join `hoteldb`.`comptes` on((`hoteldb`.`transactions`.`ID_CPT` = `hoteldb`.`comptes`.`id_cpt`))) join `hoteldb`.`sous_chapitres` on((`hoteldb`.`comptes`.`ID_SCHAP` = `hoteldb`.`sous_chapitres`.`id_schap`))) where (`hoteldb`.`sous_chapitres`.`nature_schap` = 0)
