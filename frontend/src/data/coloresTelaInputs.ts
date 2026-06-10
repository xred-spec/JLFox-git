import type { Input } from "@/interfaces/FormInput";

export const coloresTelaInputs: Input[] = [
    {
        label: 'Color',
        modelKey: 'color',
        type: 'text',
        required: true,
        placeholder: 'Introduzca el color...'
    },
    {
        label: 'Tipo de tela',
        modelKey: 'tela_id',
        type: 'select',
        required: true,
        options: [],
    },
]

