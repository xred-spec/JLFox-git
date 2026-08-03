import type { Input } from "@/interfaces/FormInput";

export const prendasInputs: Input[] = [
    {
        label: 'Tipo',
        modelKey: 'tipo',
        type: 'select',
        required: true,
        placeholder: 'Introduzca el tipo...',
        options: [
            {label: 'Adulto', value: 'adulto'},
            {label: 'Niño', value: 'niño'},
        ]
    },
    {
        label: 'Talla',
        modelKey: 'talla',
        type: 'number',
        required: true,
        placeholder: 'Tallas posibles: 2- 50',
        min: 2,
        max: 50,
        step: 2
    },
    {
        label: 'Tipo de prenda',
        modelKey: 'tipo_prenda_id',
        type: 'select',
        required: true,
        options: [
            {label: 'Seleccione una opción', value: ''},
        ]
    },
    /*
    {
        label: 'Modelo',
        modelKey: 'talla',
        type: 'select',
        required: true,
        options: [
            {label: 'Rodeo', value: 1}
        ]
    },
    */
    {
        label: 'Tipo y clor de tela',
        modelKey: 'color_tela_id',
        type: 'select',
        required: true,
        options: [
            {label: 'Seleccione una opción', value: ''},
        ]
    },
    {
        label: 'Forma y color de bordado',
        modelKey: 'bordado_id',
        type: 'select',
        required: false,
        options: [
            {label: 'Seleccione una opción', value: ''},
        ]
    },
    {
        label: 'Color del forro',
        modelKey: 'forro_id',
        type: 'select',
        required: false,
        options: [
            {label: 'Seleccione una opción', value: ''},
        ]
    },
    {
        type: 'checkboxes',
        required: false,
        modelKey: '',
        checkboxItems: [
            {
                label: '¿Tiene bordado?',
                required: false,
                modelKey: 'tiene_bordado' 
            },
            {
                label: '¿Tiene forro?', 
                required: false,
                modelKey: 'tiene_forro' 
            },
            {
                label: '¿Tiene cartera?',
                required: false,
                modelKey: 'tiene_cartera' 
            },
        ]
    },
]

