<?php

if (!function_exists('getUpdateData')) {
    /**
     * Get data for an update on a model instance (the non-null ones)
     *
     * @param array<string, mixed> $formModelInstanceData An associative array with the form's model instance data (e.g: $request->user => <form><input name="user.email" value="someValue"/>, <input name="user.name" value="someValue"/>...).
     * @param \Illuminate\Database\Eloquent\Model $modelInstance The instance of the model used in the form.
     * @param array $formModelInstanceSpecialFields An array with "name" attributes explicitly defined in the form - not ones such as "_method" - that do not receive a value that's directly stored in the database and if null, shouldn't be considered on update, such as 'password'
     * @return array<string, mixed> An associative array with the data to be used in the update.
     */
    function getUpdateData($formModelInstanceData, $modelInstance, $formModelInstanceSpecialFields)
    {
        $updateData = [];

        foreach ($formModelInstanceData as $key => $value) {
            // check if the formData is not actually stored in the database;
            // if the field remained unchanged or is "special" - read the meaning in the docblock above.
            if (!array_key_exists($key, $modelInstance->getAttributes()) || $modelInstance->$key === $value || (in_array($key, $formModelInstanceSpecialFields) && $value === null)) continue;

            $updateData[$key] = $value;
        }

        return $updateData;
    }
}
