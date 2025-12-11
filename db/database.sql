-- Afficher tous les rendez-vous d'un patient particulier.

SELECT u.nom_user , r.id_rdv 
FROM users u 
INNER JOIN render_vous r ON u.id_user = r.id_patient
WHERE u.id_user =2;

--Afficher tous les rendez-vous confirmés ou non confirmés.

SELECT * FROM render_vous WHERE status ='confirme';


-- Afficher le détail des rendez-vous avec les informations sur les utilisateurs et les médecins (utilisation de jointures).
SELECT 
    r.id_rdv,
    u_p.id_user AS id_patient,
    u_p.nom_user AS nom_patient,
    u_m.id_user AS id_medecin,
    u_m.nom_user AS nom_medecin,
    r.date_rvd
FROM render_vous r
INNER JOIN users u_p ON u_p.id_user = r.id_patient
INNER JOIN users u_m ON u_m.id_user = r.id_medecin;


--Écrivez une requête SQL pour modifier le statut d'un rendez-vous, par exemple pour passer de "non confirmé" à "confirmé".
UPDATE render_vous 
set status = 'confirme'
WHERE id_rdv =3;

--Écrivez une requête SQL pour supprimer un rendez-vous ou un utilisateur (patient ou médecin).
DELETE FROM render_vous WHERE id_rdv =4;



--Calcul du nombre total de rendez-vous par patient :
SELECT u.nom_user AS nom_patient , COUNT(r.id_patient) AS nombre_total FROM users u INNER JOIN render_vous r ON u.id_user = r.id_patient
GROUP BY u.id_user, u.nom_user;


--Somme des montants des factures par patient :
SELECT u.nom_user AS nom_patient , SUM(f.montant) AS total_montant FROM users u INNER JOIN render_vous r ON r.id_patient =u.id_user INNER JOIN factures f ON f.id_rvd = r.id_rdv 
GROUP BY u.nom_user;

--Moyenne des montants des factures pour tous les rendez-vous confirmés :
SELECT AVG(f.montant) as moyene FROM factures f INNER JOIN render_vous r ON r.id_rdv = f.id_rvd WHERE r.status = 'confirme';



--Rendez-vous les plus récents et les plus anciens :
SELECT id_rdv FROM render_vous WHERE date_rvd =( SELECT MAX(date_rvd) FROM render_vous);
SELECT id_rdv FROM render_vous WHERE date_rvd =( SELECT MIN(date_rvd) FROM render_vous);


--Top des médecins avec le plus de rendez-vous confirmés :
SELECT u.nom_user AS nom_medcin , COUNT(r.id_rdv) AS nombre_rdv FROM users u INNER JOIN render_vous r ON r.id_medecin = u.id_user WHERE r.status = 'confirme' GROUP BY u.nom_user ORDER BY nombre_rdv DESC;