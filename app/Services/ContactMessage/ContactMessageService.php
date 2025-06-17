<?php

namespace App\Services\ContactMessage;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\ContactMessage\ContactMessage;

class ContactMessageService
{
    /**
     * Get paginated list of contact messages
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedContactMessages(int $perPage = 5): LengthAwarePaginator
    {
        return ContactMessage::orderBy('contact_message_id', 'DESC')->paginate($perPage);
    }

    /**
     * Create a new contact message
     *
     * @param array $data
     * @param UploadedFile|null $image
     * @return ContactMessage
     */
    public function createContactMessage(array $data): ContactMessage
    {
        $contactMessage = ContactMessage::create($data);

        return $contactMessage;
    }

    /**
     * Check if a contact message can be deleted.
     *
     * @param int $contact_message_id
     * @return void
     */
    public function canDeleteContactMessage(int $contact_message_id): bool
    {
        $contactMessage = ContactMessage::find($contact_message_id);

        // Todo

        return true;
    }

    /**
     * Delete contact message
     *
     * @param int $contact_message_id
     * @return void
     */
    public function deleteContactMessage(int $contact_message_id): void
    {
        $contactMessage = ContactMessage::find($contact_message_id);

        $contactMessage->delete();
    }

    /**
     * Get total contact message count
     *
     * @return int
     */
    public function getTotalContactMessageCount(): int
    {
        return ContactMessage::count();
    }
}
