<?php

namespace Srpv\ProtocolizacionBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * AsignacionCensoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AsignacionCensoRepository extends EntityRepository
{
    public function getBeneficiariosAdjudicados()
    {

    	return $this->getEntityManager()
       				->createQuery('SELECT b.id, p.nacionalidad, p.cedula, p.primerNombre as nombre, p.primerApellido as apellido, e.nombre as estatus, g.nombre as estado, gm.nombre as municipio, o.nombre as oficina
                                   FROM SrpvProtocolizacionBundle:Beneficiario b
                                   JOIN ComunesTablasBundle:Persona p WITH b.persona = p.id
                                   JOIN SrpvProtocolizacionBundle:EstatusBeneficiario e WITH b.estatusBeneficiario = e.id AND e.id = 2
                                   JOIN ComunesTablasBundle:GeoEstado g WITH b.geoEstado = g.id
                                   JOIN ComunesTablasBundle:GeoMunicipio gm WITH b.geoMunicipio = gm.id
                                   LEFT JOIN SrpvProtocolizacionBundle:AsignacionCenso ac WITH ac.persona = b.id
                                   LEFT JOIN SrpvProtocolizacionBundle:Oficina o WITH ac.oficina = o.id
                                   ORDER BY b.id ASC')
//       				->createQuery('SELECT b.id, p.nacionalidad, p.cedula, p.primerNombre as nombre, p.primerApellido as apellido, e.nombre as estatus, g.nombre as estado, gm.nombre as municipio, o.nombre as oficina, jefe.primerNombre as jefeNombre
//                                   FROM SrpvProtocolizacionBundle:Beneficiario b
//                                   JOIN ComunesTablasBundle:Persona p WITH b.persona = p.id
//                                   JOIN SrpvProtocolizacionBundle:EstatusBeneficiario e WITH b.estatusBeneficiario = e.id AND e.id = 2
//                                   JOIN ComunesTablasBundle:GeoEstado g WITH b.geoEstado = g.id
//                                   JOIN ComunesTablasBundle:GeoMunicipio gm WITH b.geoMunicipio = gm.id
//                                   LEFT JOIN SrpvProtocolizacionBundle:AsignacionCenso ac WITH ac.persona = b.id
//                                   LEFT JOIN SrpvProtocolizacionBundle:Oficina o WITH ac.oficina = o.id
//                                   LEFT JOIN SrpvProtocolizacionBundle:Oficina o, SrpvProtocolizacionBundle:Persona jefe WITH o.personaIdJefe = jefe.id
//                                   ORDER BY b.id ASC')

       				->getResult();


    }
}