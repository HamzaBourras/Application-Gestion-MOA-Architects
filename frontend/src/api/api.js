export const INSCRIRE_API = "http://localhost:8000/api/auth/inscrire";
export const CONNECTER_API = "http://localhost:8000/api/auth/connecter";
export const DECONNECTER_API = "http://localhost:8000/api/auth/deconnecter/";
export const MODIFIER_PROFILE_API = "http://localhost:8000/api/auth/modifierProfile/";


/*************** Admin ****************/
/**** Demandes ****/
export const TOUS_DEMANDES = "http://localhost:8000/api/admin/demandes/index/";
export const EDIT_STATUT_DEMANDES = "http://localhost:8000/api/admin/demandes/edit/";  // pour changer le statut de la demande accepté(1) ou refusé(0)

/**** Terrains ****/
export const EDIT_STATUT_TERRAIN = "http://localhost:8000/api/admin/demandes/editTerrain/";  // pour changer le statut du terrain accepté(1) ou refusé(0)
/**** Projets ****/
export const AJOUTER_AUX_PROJETS = "http://localhost:8000/api/admin/projets/store/";  // pour ajouter la demande aux projets en cours d'éxecution
export const TOUS_PROJETS = "http://localhost:8000/api/admin/projets/index/";
export const TOUS_IMAGES_PROJET = "http://localhost:8000/api/admin/projets/images/index/"
export const INSERER_IMAGES_PROJET = "http://localhost:8000/api/admin/projets/images/store/";
export const EDIT_PROJET_TERMINE = "http://localhost:8000/api/admin/projets/edit/";  // pour marquer le projet terminé


/**** Contrats ****/
export const TOUS_CONTRATS = "http://localhost:8000/api/admin/contrats/index/";
export const INSERER_CONTRAT = "http://localhost:8000/api/admin/contrats/store/";  // pour ajouter un rendez-vous pour la signature du contrat
export const EDIT_STATUT_CONTRAT = "http://localhost:8000/api/admin/contrats/edit/";  // pour changer le statut du contrat: segné

/**** Clients ****/
export const TOUS_CLIENTS = "http://localhost:8000/api/admin/clients/index/";

/**** Rendez-vous ****/
export const TOUS_RENDEZVOUS = "http://localhost:8000/api/admin/rendez-vous/index/";





/*************** Client ***************/
/**** Demandes ****/
export const TOUS_MES_DEMANDES = "http://localhost:8000/api/client/mesDemandes/index/";
export const INSERER_DEMANDE = "http://localhost:8000/api/client/mesDemandes/store/";
export const MODIFIER_DEMANDE = "http://localhost:8000/api/client/mesDemandes/edit/";
export const SUPPRIMER_DEMANDE = "http://localhost:8000/api/client/mesDemandes/destroy/";
export const INSERER_TERRAIN = "http://localhost:8000/api/client/mesDemandes/storeTerrain/";

/**** Contrats ****/
export const EDIT_VU_CONTRAT = "http://localhost:8000/api/client/contrats/edit/";  // pour marquer le contrat vu

/**** Rendez-vous ****/
export const TOUS_MES_RENDEZVOUS = "http://localhost:8000/api/client/rendez-vous/index/";
export const INSERER_RENDEZVOUS = "http://localhost:8000/api/client/rendez-vous/store/";
export const MODIFIER_RENDEZVOUS = "http://localhost:8000/api/client/rendez-vous/edit/";
export const SUPPRIMER_RENDEZVOUS = "http://localhost:8000/api/client/rendez-vous/destroy/";

/**** Mes projets ****/
export const TOUS_MES_PROJETS = "http://localhost:8000/api/client/mesProjets/index/";
