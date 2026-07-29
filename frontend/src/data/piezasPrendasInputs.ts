import type { Input } from "@/interfaces/FormInput";

export const piezasPrendasInputs: Input[] = [
    {
        label: 'Nombre',
        modelKey: 'nombre',
        type: 'text',
        required: true,
        placeholder: 'Introduzca el nombre...'
    },
    {
        label: 'Tipo de prenda',
        modelKey: 'tipo_prenda_id',
        type: 'select',
        required: true,
    },
    
]

