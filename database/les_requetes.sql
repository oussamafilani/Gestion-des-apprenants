-- les requêtes SQL

--R1 

select nom_etu from etudiant WHERE nom_etu  LIKE 's%';

--R2

SELECT * FROM enseignant INNER JOIN module WHERE module.fk_enseigne = enseignant.id_enseignant

--R3

SELECT AVG(note_module) as 'moyenne generale' FROM note;

--R4

SELECT count(id_etudiant) as 'nombre des etudiants' from etudiant;

--R5

SELECT etudiant.nom_etu,absence.justifiee as 'absence justifiee' , seance.date_seance FROM etudiant,absence,seance
WHERE absence.fk_etudiant = etudiant.id_etudiant and absence.fk_seance = seance.id_seance;

--R6

SELECT etudiant.nom_etu,etudiant.prenom_etu,note.note_module,module.intitule_module
FROM etudiant
INNER JOIN note
ON note.fk_etudiant = etudiant.id_etudiant
INNER JOIN module
ON note.fk_module = module.id_module;