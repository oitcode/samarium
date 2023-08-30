<div class="border p-3 bg-white">

  <div class="form-group mb-3">
    <label>
      Day
    </label>
    <select class="form-control" wire:model.defer="available_day">
      <option value='---'>---</option>
      <option value="sunday">Sunday</option>
      <option value="monday">Monday</option>
      <option value="tuesday">Tuesday</option>
      <option value="wednesday">Wednesday</option>
      <option value="thursday">Thursday</option>
      <option value="friday">Friday</option>
      <option value="saturday">Saturday</option>
    </select>
    @error ('available_day')
      <div class="text-danger">
        {{ $message }}
      </div>
    @enderror
  </div>

  <div>
    <div class="d-flex">
      <div class="mr-5">
        <label>
          Start time
        </label>
        <select class="form-control" wire:model.defer="start_time">
          <option value='---'>---</option>
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
        </select>
      </div>
      <div>
        <label>
          End time
        </label>
        <select class="form-control" wire:model.defer="end_time">
          <option value='---'>---</option>
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
        </select>
      </div>
    </div>
    <div>
      @error ('start_time')
        <div class="text-danger mt-3">
          {{ $message }}
        </div>
      @enderror
      @error ('end_time')
        <div class="text-danger mt-3">
          {{ $message }}
        </div>
      @enderror
    </div>
  </div>
  <div class="py-3">
    <button class="btn btn-success mr-2" wire:click="store">
      Save
    </button>
    <button class="btn btn-danger mr-2" wire:click="$emit('addAvailabilityCancelled')">
      Cancel
    </button>
  </div>
</div>
