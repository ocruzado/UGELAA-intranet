<?php

namespace HelpDesk\Enum;

abstract class TicketStates
{
    const _key = 100;
    const Generado = 1;
    const Asignado = 2;
    const Abierto = 3;
    const Cerrado = 4;
    const Rechazado = 5;
}