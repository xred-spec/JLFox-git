export interface Input {
    label?: string,
    modelKey: string,
    type: 'text' | 'number' | 'select' | 'email' | 'password' | 'date' | 'textarea' | 'tel' | 'checkboxes', 
    options?: {
        value: number | string,
        label: string | null,
        selected?: boolean
    }[],
    checkboxItems?: {
        label: string | null,
        required?: boolean,
        modelKey: string
    }[],
    placeholder?: string,
    required: boolean, 
    min?: number,
    max?: number,
}