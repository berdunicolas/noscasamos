<?php

namespace App\Handlers;

use App\Enums\ModuleTypeEnum;
use App\Enums\PlanTypeEnum;

class ConfirmationModuleHandler extends GenericModuleHandler{
    const TYPE = ModuleTypeEnum::CONFIRMATION;
    const ACTIVE = false;
    const FIXED =  false;
    const IS_UNIQUE = true;
    const PLAN = PlanTypeEnum::PLATINO->value;

    const DATA = [
        'icon' => 'heqlbljj',
        'pre_tittle' => 'RSVP',
        'tittle' => 'Confirmación de Asistencia',
        'text' => 'Esperamos contar con tu presencia',
        'limit_date' => 'Por favor confirmar antes del ',
        'card_active' => false,
        'card_tittle' => 'Valor de Tarjetas',
        'card_text' => '',
        'card_button_text' => 'Cómo Abonar',
        'form_active' => false,
        'form_button_text' => 'Confirmar Asistencia',
        'form_button_url' => '',
        'form_text' => 'El formulario es individual.<br> Si tu invitación incluye acompañantes repetí el proceso por cada persona.',
        'form_ill_attend' => 'Asistiré',
        'form_ill_n_attend' => 'No Asistiré',
        'form_name' => '',
        'form_email' => '',
        'form_phone' => '',
        'form_special_menu' => '¿Necesitas un menú especial?',
        'form_nothing' => 'Ninguno',
        'form_menu1' => 'Celiaco',
        'form_menu2' => 'Vegetariano',
        'form_menu3' => 'Vegano',
        'form_menu4' => 'Diabético',
        'form_menu5' => 'Kosher',
        'form_transfer' => '',
        'form_option1' => 'No, voy por mis propios medios',
        'form_option2' => 'Si, necesito traslado',
        'form_option3' => '',
        'form_option4' => '',
        'form_companions' => 'Apellido y nombres de acompañantes (si corresponde)',
        'form_comments' => 'Comentarios',
        'form_thanks' => '¡Gracias por confirmar tu asistencia!',
        'form_errors' => 'Por favor completa todos los campos',
    ];
}