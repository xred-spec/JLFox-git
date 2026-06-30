import type { Column } from '@/interfaces/DataColumn'

export const prendasProcesosColumns: Column[] = [

    {key: 'tipo', label: 'Tipo'},
    {key: 'talla', label: 'Talla'},
    {key: 'tipo_prenda.nombre', label: 'Tipo de prenda'},
    {key: 'color_tela.tela.nombre', label: 'Tipo de tela'},
    {key: 'color_tela.color', label: 'Color de tela'},
    {key: 'bordado.forma', label: 'Forma del bordado'},
    {key: 'bordado.color_hilo.color', label: 'Color del bordado'},
    {key: 'forro.color', label: 'Color de forro'},
    {key: 'tiene_cartera', label: 'Cartera'},

    
    
]