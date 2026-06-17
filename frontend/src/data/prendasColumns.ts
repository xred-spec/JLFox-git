import type { Column } from '@/interfaces/DataColumn'

export const prendasColumns: Column[] = [
    {key: 'index', label: '#'},
    {key: 'tipo', label: 'Tipo'},
    {key: 'talla', label: 'Talla'},
    {key: 'tipo_prenda.nombre', label: 'Tipo de prenda'},
    {key: 'color_tela.color', label: 'Tipo y color de tela'},
    {key: 'bordado.forma', label: 'Forma y color de bordado'},
    {key: 'forro.color', label: 'Color de forro'},
    {key: 'tiene_cartera', label: 'Cartera'},
    {key: 'options', label: 'Opciones'}
]