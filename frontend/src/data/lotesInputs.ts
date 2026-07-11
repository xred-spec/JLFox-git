import type { Input } from "@/interfaces/FormInput";

export const lotesInputs: Input[] = [
    {
        label: 'Estado',
        modelKey: 'estado',
        type: 'select',
        required: true,
        placeholder: 'Introduzca el estado...',
        options: [
            {label: 'Pendiente', value: 'pendiente'},
            {label: 'Producción', value: 'produccion'},
            {label: 'Terminado', value: 'terminado'},
        ]
    },
    {
        label: 'Fecha de inicio',
        modelKey: 'fecha_inicio',
        type: 'date',
        required: true,
        placeholder: 'Introduzca la fecha de inicio...'
    },
    {
        label: 'Fecha de final',
        modelKey: 'fecha_final',
        type: 'date',
        required: false,
        placeholder: 'Introduzca la fecha de final...'
    },
]