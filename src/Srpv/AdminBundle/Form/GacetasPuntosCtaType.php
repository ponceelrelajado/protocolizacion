<?php

namespace Srpv\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GacetasPuntosCtaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descripcion','text',array('label'  => 'Descripción:',
                                'required' => true,
                                'attr' => array('rows' => '3', 
                                                'cols' => '2',
                                                'maxlength' => '250')))   
                
            ->add('estatus','choice', array('label'  => 'Estatus:',
                                            'choices'   => array('S' => 'ACTIVO',
                                                                 'N' => 'INACTIVO'),
                                            'required'  => true,)) 
                    
                
            ->add('fechaPublicacion', 'date', array('label'  => 'Fecha de Publicación:',
                                                    'input'  => 'datetime',
                                                    'widget' => 'choice',
                                                    'empty_value' => array('year' => 'Año', 'month' => 'Mes', 'day' => 'Dia'),    
                                                    'required'  => true ))   
                
            ->add('nroDecreto','text',array('label'  => 'Número de Decreto:',
                        'required' => true,))   
            
            ->add('nroGaceta','text',array('label'  => 'Número de Gaceta:',
                        'required' => true,))     

            ->add('nroPtoCta','text',array('label'  => 'Número Punto de Cuenta:',
                        'required' => true,))

            ->add('observaciones','text',array('label'  => 'Observaciones:',
                                'required' => false,
                                'attr' => array('rows' => '3', 
                                                'cols' => '3',
                                                'maxlength' => '200'))) 
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Srpv\ProtocolizacionBundle\Entity\GacetasPuntosCta'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'srpv_protocolizacionbundle_gacetaspuntoscta';
    }
}
