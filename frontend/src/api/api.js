const baseUrl = "http://localhost:8000/";

export const INSCRIRE_API = `${baseUrl}api/auth/inscrire`;
export const CONNECTER_API = `${baseUrl}api/auth/connecter`;
export const DECONNECTER_API = `${baseUrl}api/auth/deconnecter/`;
export const MODIFIER_PROFILE_API = `${baseUrl}api/auth/modifierProfile/`;

/*************** Admin ****************/
/**** Demandes ****/
export const TOUS_DEMANDES = `${baseUrl}api/admin/demandes/index/`;
export const EDIT_STATUT_DEMANDES = `${baseUrl}api/admin/demandes/edit/`; // pour changer le statut de la demande accepté(1) ou refusé(0)

/**** Terrains ****/
export const EDIT_STATUT_TERRAIN = `${baseUrl}api/admin/demandes/editTerrain/`; // pour changer le statut du terrain accepté(1) ou refusé(0)
/**** Projets ****/
export const AJOUTER_AUX_PROJETS = `${baseUrl}api/admin/projets/store/`; // pour ajouter la demande aux projets en cours d'éxecution
export const TOUS_PROJETS = `${baseUrl}api/admin/projets/index/`;
export const TOUS_IMAGES_PROJET = `${baseUrl}api/admin/projets/images/index/`;
export const INSERER_IMAGES_PROJET = `${baseUrl}api/admin/projets/images/store/`;
export const EDIT_PROJET_TERMINE = `${baseUrl}api/admin/projets/edit/`; // pour marquer le projet terminé

/**** Contrats ****/
export const TOUS_CONTRATS = `${baseUrl}api/admin/contrats/index/`;
export const INSERER_CONTRAT = `${baseUrl}api/admin/contrats/store/`; // pour ajouter un rendez-vous pour la signature du contrat
export const EDIT_STATUT_CONTRAT = `${baseUrl}api/admin/contrats/edit/`; // pour changer le statut du contrat: signé

/**** Clients ****/
export const TOUS_CLIENTS = `${baseUrl}api/admin/clients/index/`;

/**** Rendez-vous ****/
export const TOUS_RENDEZVOUS = `${baseUrl}api/admin/rendez-vous/index/`;

/**** Dashboard *****/
export const DASHBOARD_DATA = `${baseUrl}api/admin/statiques`;



/*************** Client ***************/
/**** Demandes ****/
export const TOUS_MES_DEMANDES = `${baseUrl}api/client/mesDemandes/index/`;
export const INSERER_DEMANDE = `${baseUrl}api/client/mesDemandes/store/`;
export const MODIFIER_DEMANDE = `${baseUrl}api/client/mesDemandes/edit/`;
export const SUPPRIMER_DEMANDE = `${baseUrl}api/client/mesDemandes/destroy/`;
export const INSERER_TERRAIN = `${baseUrl}api/client/mesDemandes/storeTerrain/`;

/**** Contrats ****/
export const EDIT_VU_CONTRAT = `${baseUrl}api/client/contrats/edit/`; // pour marquer le contrat vu

/**** Rendez-vous ****/
export const TOUS_MES_RENDEZVOUS = `${baseUrl}api/client/rendez-vous/index/`;
export const INSERER_RENDEZVOUS = `${baseUrl}api/client/rendez-vous/store/`;
export const MODIFIER_RENDEZVOUS = `${baseUrl}api/client/rendez-vous/edit/`;
export const SUPPRIMER_RENDEZVOUS = `${baseUrl}api/client/rendez-vous/destroy/`;

/**** Mes projets ****/
export const TOUS_MES_PROJETS = `${baseUrl}api/client/mesProjets/index/`;
export const INSERER_COMMENTAIRE = `${baseUrl}api/client/mesProjets/commentaire/store/`;

/**** Dashboard *****/
export const CLIENT_DASHBOARD_DATA = `${baseUrl}api/client/statiques/`;

/************************ Public ******/
export const TOUS_COMMENTAIRES = `${baseUrl}api/public/commentaires/index/`;
export const TOUS_PROJETS_DU_TYPE = `${baseUrl}api/public/projets-du-type/index/`;
