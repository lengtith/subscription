@if ($subscriber->status == 'new')
<div class="d-flex align-items-center justify-content-center" style="height: calc(100vh - 56px)">
    <div class="d-flex flex-column align-items-center justify-content-center gap-4">
        <h2 class="card-title text-center">Thanks for submitting!</h2>
        <p class="card-text text-center">We're on processing. You'll receive approved email within 24 hours.</p>
    </div>
</div>
@endif

@if ($subscriber->status == 'edited')
<div class="d-flex align-items-center justify-content-center" style="height: calc(100vh - 56px)">
    <div class="d-flex flex-column align-items-center justify-content-center gap-4">
        <h2 class="card-title text-center">We recomment you to edit some point!</h2>
        <p class="card-text text-center">We're on processing. You'll receive approved email within 24 hours.</p>
        <button class="btn btn-primary" wire:click="handleEdit">Go to edit</button>
    </div>
</div>
@endif

@if ($subscriber->status == 'rejected')
<div class="d-flex align-items-center justify-content-center" style="height: calc(100vh - 56px)">
    <div class="d-flex flex-column align-items-center justify-content-center gap-4">
        <h2 class="card-title text-center">Sorry your request has been rejected!</h2>
        <p class="card-text text-center">We're on processing. You'll receive approved email within 24 hours.</p>
    </div>
</div>
@endif

@if ($subscriber->status == 'approved')
<div class="d-flex align-items-center justify-content-center" style="height: calc(100vh - 56px)">
    <div class="d-flex flex-column align-items-center justify-content-center gap-4">
        <h2 class="card-title text-center">Congratulation!</h2>
        <p class="card-text text-center">You have approved as subscriber. Please enjoy your subscription!</p>
        <button wire:click="gotoForm" type="submit" class="btn btn-primary">Get Start!</button>
    </div>
</div>
@endif