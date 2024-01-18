<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    { 
        return [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:255',
            'telephone' => ['required', 'regex:/^\+221(77|78|76|70)\d{7}$/'],
            // 'image' => 'required|string',  // Vous devrez ajuster cette règle en fonction de vos besoins
            'adresse' => 'required|string',
            'etat' => ['required', 'string', Rule::in(['actif', 'inactif'])],
            'role_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
       'nom.required' => 'Le champ nom est requis.',
        'prenom.required' => 'Le champ prénom est requis.',
        'email.max' => 'Le champ email ne doit pas dépasser :max caractères.',
        'password.max' => 'Le champ mot de passe ne doit pas dépasser :max caractères.',
        'telephone.regex' => 'Le champ numéro de téléphone doit être au format spécifié.',
        'adresse.required' => 'Le champ adresse est requis.',
        'etat.in' => 'Le champ état doit être actif ou inactif.',
        'role_id.required' => 'Le champ role_id est requis.'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        // Si la validation échoue, vous pouvez accéder aux erreurs
        $errors = $validator->errors()->toArray();

        // Retournez les erreurs dans la réponse JSON
        throw new HttpResponseException(response()->json(['errors' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
        
    }

