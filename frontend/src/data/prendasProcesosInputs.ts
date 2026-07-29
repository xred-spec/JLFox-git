import type { Input } from "@/interfaces/FormInput";

export const prendasProcesosInputs: Input[] = [
    {
        label: 'Prenda',
        modelKey: 'prenda_id',
        type: 'select',
        required: true,
        placeholder: 'Introduzca el tipo...',
    },   
    {
        label: 'Pieza',
        modelKey: 'pieza_id',
        type: 'select',
        required: true,
    },   
]