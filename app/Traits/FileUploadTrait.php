<?php
namespace App\Traits;

trait FileUploadTrait
{
    /**
     * @param ClubRequest $request
     * @param SystemRequest $request
     * @param $company
     * @return void
     */

    public function fileUpload( $user_request, $model, $field): void
    {
        $request = $user_request;
        
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $fileName = time() . '_' . $file->getClientOriginalName();

            $file->storeAs('uploads', $fileName, 'public');
            $model->$field = $fileName;
            $model->save();
        }
    }
}
