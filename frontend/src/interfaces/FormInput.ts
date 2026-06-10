export interface Input {
    label: string,
    modelKey: string,
    type: 'text' | 'number' | 'select' | 'email' | 'password' | 'date' | 'textarea' | 'tel',
    options?: {
        value: number | string,
        label: string | null
    }[],
    placeholder?: string,
    required: boolean, 
    min?: number,
    max?: number,
}