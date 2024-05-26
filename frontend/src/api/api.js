export const INSCRIRE_API = "http://localhost:8000/api/auth/inscrire";
export const CONNECTER_API = "http://localhost:8000/api/auth/connecter";
export const DECONNECTER_API = "http://localhost:8000/api/auth/deconnecter/";


/*************** Admin ****************/
/**** Demandes ****/
export const TOUS_DEMANDES = "http://localhost:8000/api/admin/demandes/index/";
export const EDIT_STATUT_DEMANDES = "http://localhost:8000/api/admin/demandes/editDemande/";  // pour changer le statut de la demande accepté(1) ou refusé(0)
export const EDIT_STATUT_TERRAIN = "http://localhost:8000/api/admin/demandes/editTerrain/";  // pour changer le statut du terrain accepté(1) ou refusé(0)
export const INSERER_CONTRAT = "http://localhost:8000/api/admin/demandes/storeContrat/";  // pour ajouter un rendez-vous pour la signature du contrat
export const EDIT_STATUT_CONTRAT = "http://localhost:8000/api/admin/demandes/editContrat/";  // pour changer le statut du contrat: segné
export const AJOUTER_AUX_PROJETS = "http://localhost:8000/api/admin/demandes/storeProjet/";  // pour ajouter la demande aux projets en cours d'éxecution


/*************** Client ***************/
/**** Demandes ****/
export const TOUS_MES_DEMANDES = "http://localhost:8000/api/client/mesDemandes/index/";
export const INSERER_DEMANDE = "http://localhost:8000/api/client/mesDemandes/store/";
export const MODIFIER_DEMANDE = "http://localhost:8000/api/client/mesDemandes/edit/";
export const SUPPRIMER_DEMANDE = "http://localhost:8000/api/client/mesDemandes/destroy/";
export const INSERER_TERRAIN = "http://localhost:8000/api/client/mesDemandes/storeTerrain/";
export const EDIT_VU_CONTRAT = "http://localhost:8000/api/client/mesDemandes/editContrat/";  // pour marquer le contrat vu
