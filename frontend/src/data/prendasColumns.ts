import type { Column } from '@/interfaces/DataColumn'

export const prendasColumns: Column[] = [
    {key: 'index', label: '#'},
    {key: 'tipo', label: 'Tipo'},
    {key: 'talla', label: 'Talla'},
    {key: 'tipo_prenda', label: 'Tipo de prenda'},
    {key: 'tipo_color_tela', label: 'Tipo y color de tela'},
    {key: 'bordado_id', label: 'Forma y color de bordado'},
    {key: 'forro_id', label: 'Color de forro'},
    {key: 'options', label: 'Opciones'}
]