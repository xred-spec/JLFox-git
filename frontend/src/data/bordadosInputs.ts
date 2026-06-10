import type { Input } from "@/interfaces/FormInput";

export const bordadosInputs: Input[] = [
    {
        label: 'Forma',
        modelKey: 'forma',
        type: 'text',
        required: true,
        placeholder: 'Introduzca la forma...'
    },
    {
        label: 'Color de hilo',
        modelKey: 'color_hilo_id',
        type: 'select',
        required: true,
        options: [],
    },
]

