<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enum extends Model
{

    static function typeId(): array
    {
        return [
            'SC' => ['SC', 'Salvoconducto de Permanencia'], //El Salvoconducto de Permanencia, es el documento de car�cter temporal expedido por la Unidad Administrativa Especial de Migraci�n Colombia.'
            'CD' => ['CD', 'Carnét Diplomático'], //El Carnét Diplomático, es el documento que identifica a extranjeros que cumplen funciones en las embajadas, legaciones'
            'PA' => ['PA', 'Pasaporte'], //El Pasaporte, es el documento de identificaci�n del extranjero que no se encuentra obligado a tramitar una c�dula de extranjer�a.
            'CE' => ['CE', 'Cédula de Extranjería'], //La C�dula de Extranjer�a, es el documento de identificaci�n expedido por Migraci�n Colombia, que se otorga a los extranjeros titulares de una visa superior a 3 meses y a sus beneficiarios, con base en el Registro de Extranjeros. La Vigencia de la C�dula de Extranjer�a ser� por un t�rmino igual al de la vigencia de la visa del titular.'
            'CC' => ['CC', 'Cédula de Ciudadanía'], //'La C�dula de Ciudadan�a, es el documento expedido por la Registradur�a Nacional del Estado Civil, con el que se identifican las personas al cumplir 18 a�os de edad.'
            'TI' => ['TI', 'Tarjeta de Identidad'], //La Tarjeta de Identidad, es un documento expedido por la Registradur�a Nacional del Estado Civil con el que se identifican los menores entre 7 y 17 a�os. Debe ser reemplazada por la c�dula de ciudadan�a.'
            'RC' => ['RC', 'Registro Civil de Nacimiento'], //El Registro Civil de Nacimiento, es el documento expedido por una notar�a p�blica con el que se identifican los menores de 7 a�os. Debe ser reemplazado por la tarjeta de identidad.'
            'CN' => ['CN', 'Certificado de Nacido Vivo'], //El Certificado de Nacido Vivo, es el documento expedido por la Instituci�n Prestadora de Servicios (IPS) donde naci� el neonato. Solo tiene validez para realizar la afiliaci�n, y m�ximo hasta el tercer mes de vida. Debe ser reemplazado por el registro civil.'
        ];
    }

    static function typeState(): array
    {
        return [
            'A' => ['A', 'ACTIVO'], // ACTIVO
            'I' => ['I', 'INACTIVO'],  // INACTIVO ES CUANDO AUN NO SE TERMINA EL PROCESO DE AFILIACION
            'M' => ['M', 'MORA'], // MORA ES CUANDO SE PRESENTA RETRASO EN LOS PAGOS
            'D' => ['D', 'DESACTIVADO'], // DESACTIVADO CUANDO EL TRABAJADOR SE RETIRA DE LA EMPRESA
        ];
    }

    static function typeSex(): array
    {
        return [
            'M' => ['M', 'MASCULINO'], // MASCULINO
            'F' => ['F', 'FEMENINO'], // FEMENINO
        ];
    }

    static function typeBloodType(): array
    {
        return [
            'A' => ['A', 'A'], // GRUPO_SANGUINEO A
            'B' => ['B', 'B'], // GRUPO_SANGUINEO B
            'O' => ['O', 'O'], // GRUPO_SANGUINEO O
            'AB' => ['AB', 'AB'], // GRUPO_SANGUINEO AB
        ];
    }

    static function typeFactorType(): array
    {
        return [
            '+' => ['+', 'FACTOR_RH POSITIVO'], // FACTOR_RH POSITIVO
            'B' => ['-', 'FACTOR_RH NEGATIVO'], // FACTOR_RH NEGATIVO
        ];
    }

    static function typeCivilStatus(): array
    {
        return [
            'S' => ['S', 'Soltero/a'], // Soltero/a
            'P' => ['P', 'Comprometido/a'], // Comprometido/a
            'U' => ['U', 'Union Libre'], // Union Libre
            'E' => ['E', 'Separado/a'], // Separado/a
            'C' => ['C', 'Casado/a'], // Casado/a
            'D' => ['D', 'Divorciado/a'], // Divorciado/a
            'V' => ['V', 'Viudo/a'], // Viudo/a
        ];
    }

    static function typeWorkRelated(): array
    {
        return [
            'C' => ['C', 'Afiliado/a o Cotizante'], // Afiliado/a o Cotizante
            'B' => ['B', 'Beneficiario/a'], // Beneficiario/a
        ];
    }

    static function impairment(): array
    {
        return [
            'F' => ['F', 'FÍsica'], // FÍsica
            'N' => ['N', 'Neuro-sensorial'], // Neuro-sensorial
            'M' => ['M', 'Mental'], //Mental
        ];
    }

    static function TypeImpairment(): array
    {
        return [
            'T' => ['T', 'Temporal'], // Temporal
            'P' => ['P', 'Permanente'], // Permanente
        ];
    }

    static function TypeEthnicGroup(): array
    {
        return [
            '01' => ['01', 'Indígena'], // Indígena
            '02' => ['02', 'Rrom (gitano)'], // Rrom (gitano).
            '03' => ['03', 'Raizal (San Andrés y Providencia)'], // Raizal (San Andrés y Providencia).
            '04' => ['04', 'Palenquero (San Basilio de Palenque)'], // Palenquero (San Basilio de Palenque).
            '05' => ['05', 'Negro(a), afrocolombiano(a)'], // Negro(a), afrocolombiano(a).

        ];
    }
}
