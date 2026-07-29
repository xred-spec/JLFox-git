import type { Input } from "@/interfaces/FormInput";

export const procesosInputs: Input[] = [

    {
        label: 'Tipo de prenda',
        modelKey: 'tipo_prenda_id',
        type: 'select',
        required: true,
    },
    {
        label: 'Pieza',
        modelKey: 'pieza_prenda_id',
        type: 'select',
        required: true,
    },
    {
        label: 'Área',
        modelKey: 'area',
        type: 'select',
        required: true,
        placeholder: 'Introduzca el área...',
        options: [
            {label: 'Manual', value: 'manual'},
            {label: 'Costura', value: 'costura'},
            {label: 'Plancha', value: 'plancha'},
            {label: 'Fusión', value: 'fusion'},
        ]
    },
    {
        label: 'Descripción',
        modelKey: 'descripcion',
        type: 'textarea',
        required: true,
        placeholder: 'Introduzca la descripción...'
    },
]

