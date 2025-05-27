<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./dist/style.css" rel="stylesheet">
</head>

<body class="bg-slate-50">
  <div class="flex flex-col px-2 py-2 gap-2">
    <div>
      <div class="flex flex-row items-center py-2">
        <div class="flex flex-row items-center justify-start">
          <span>
            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="12.8711" cy="12.3184" r="12" fill="#32ADE6" />
              <path
                d="M6.31201 10.3113C6.31201 12.9149 8.52053 15.0255 11.2449 15.0255C13.9692 15.0255 16.1777 12.9149 16.1777 10.3113C16.1777 7.70776 13.9692 5.59717 11.2449 5.59717C8.52053 5.59717 6.31201 7.70776 6.31201 10.3113Z"
                fill="#32ADE6" />
              <path
                d="M14.7683 13.6786L18.9965 17.7193M11.2449 15.0255C8.52053 15.0255 6.31201 12.9149 6.31201 10.3113C6.31201 7.70776 8.52053 5.59717 11.2449 5.59717C13.9692 5.59717 16.1777 7.70776 16.1777 10.3113C16.1777 12.9149 13.9692 15.0255 11.2449 15.0255Z"
                stroke="#F9FAFB" stroke-width="1.49323" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </span>
        </div>
        <div class="flex flex-row items-center justify-end flex-[1] gap-4">
          <a href="#assignMembers" class="text-sm text-slate-500 hover:text-slate-700 font-medium">Assign Members</a>
          <a href="#createGroup" class="text-sm text-slate-500 hover:text-slate-700 font-medium">Create Group</a>
        </div>
      </div>
    </div>
    <div>
      <div class="rounded-md mb-(--bottomBar)">
        <ul class="flex flex-col gap-1">
          <?php
          $groups = file_get_contents('http://localhost/sanjivani-api/api/groups/list', false, stream_context_create([
            'http' => [
              'method' => 'POST',
            ]
          ]));
          $groups = json_decode($groups ?? [], true);
          foreach ($groups as $group) {
            echo <<<HTML
                  <a href="/group.html">
                  <li class="flex bg-white px-3 py-2 rounded-xl">
                    <div class="flex flex-row items-center justify-start flex-[1]">
                        <span class="rounded-full overflow-clip flex justify-center items-center size-12 uppercase font-semibold" style="background: {$group['color']}">{$group['name'][0]}</span>
                        <h2 class="ml-4 flex gap-2">{$group['name']}</span>
                    </div>
                    <div class="flex flex-row items-center gap-3 justify-end text-green-700/77 text-sm">
                        <span><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.7173 8.07227L14.7173 12.0723L10.7173 16.0723" stroke="#1E1E1E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            </span>
                    </div>
                </li>
                </a>
HTML;
          }
          ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="h-(--bottomBar) fixed bottom-0 left-0 right-0 bg-white rounded-t-2xl">
    <ul class="flex flex-row h-full items-center">
      <li class="flex-1">
        <div class="flex flex-row items-center justify-center">
          <a href="/">
            <div class="flex flex-col items-center justify-center">
              <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M1.15224 2.73444C1.00001 3.10198 1.00001 3.56795 1 4.49981C1 5.43146 1 5.89762 1.15223 6.26512C1.35521 6.75517 1.7446 7.14456 2.23466 7.34755C2.6022 7.49979 3.06815 7.49979 4.00003 7.49979C4.93138 7.49979 5.39792 7.49979 5.76536 7.3476C6.25541 7.14461 6.6448 6.75522 6.84779 6.26516C7.00003 5.89762 7.00003 5.43168 7.00003 4.49979C7.00003 3.56791 6.99934 3.10265 6.8471 2.73511C6.64411 2.24505 6.25472 1.85566 5.76467 1.65268C5.39713 1.50043 4.93191 1.49979 4.00003 1.49979C3.06815 1.49979 2.6022 1.49979 2.23466 1.65203C1.7446 1.85502 1.35523 2.24439 1.15224 2.73444Z"
                  stroke="#1E1E1E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path
                  d="M1.1519 11.7345C0.999659 12.1021 0.999659 12.568 0.999659 13.4999C0.999661 14.4315 0.999661 14.8977 1.15188 15.2652C1.35487 15.7552 1.74426 16.1446 2.23431 16.3476C2.60185 16.4999 3.06781 16.4999 3.99968 16.4999C4.93103 16.4999 5.39758 16.4999 5.76501 16.3477C6.25507 16.1447 6.64446 15.7553 6.84745 15.2652C6.99969 14.8977 6.99969 14.4318 6.99969 13.4999C6.99969 12.568 6.999 12.1027 6.84676 11.7352C6.64377 11.2451 6.25438 10.8557 5.76432 10.6527C5.39678 10.5005 4.93157 10.4999 3.99968 10.4999C3.0678 10.4999 2.60186 10.4999 2.23431 10.6521C1.74426 10.8551 1.35489 11.2445 1.1519 11.7345Z"
                  stroke="#1E1E1E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path
                  d="M10.0001 4.49946C10.0001 5.4311 10.0001 5.89728 10.1523 6.26477C10.3553 6.75483 10.7447 7.14422 11.2347 7.34721C11.6023 7.49945 12.0682 7.49945 13.0001 7.49945C13.9314 7.49945 14.398 7.49945 14.7654 7.34725C15.2555 7.14426 15.6449 6.75487 15.8479 6.26481C16.0001 5.89727 16.0001 5.43133 16.0001 4.49945C16.0001 3.56758 15.9994 3.1023 15.8472 2.73476C15.6442 2.24471 15.2548 1.85532 14.7647 1.65233C14.3972 1.50009 13.932 1.49944 13.0001 1.49944C12.0682 1.49944 11.6023 1.49944 11.2347 1.65168C10.7447 1.85467 10.3553 2.24404 10.1523 2.7341C10.0001 3.10164 10.0001 3.5676 10.0001 4.49946Z"
                  stroke="#1E1E1E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path
                  d="M10.1523 11.7345C10.0001 12.1021 10.0001 12.568 10.0001 13.4999C10.0001 14.4315 10.0001 14.8977 10.1523 15.2652C10.3553 15.7552 10.7447 16.1446 11.2347 16.3476C11.6023 16.4999 12.0682 16.4999 13.0001 16.4999C13.9314 16.4999 14.398 16.4999 14.7654 16.3477C15.2555 16.1447 15.6449 15.7553 15.8479 15.2652C16.0001 14.8977 16.0001 14.4318 16.0001 13.4999C16.0001 12.568 15.9994 12.1027 15.8472 11.7352C15.6442 11.2451 15.2548 10.8557 14.7647 10.6527C14.3972 10.5005 13.932 10.4999 13.0001 10.4999C12.0682 10.4999 11.6023 10.4999 11.2347 10.6521C10.7447 10.8551 10.3553 11.2445 10.1523 11.7345Z"
                  stroke="#1E1E1E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              <span>Home</span>
            </div>
          </a>
        </div>
      </li>
      <li class="flex-1">
        <div class="flex flex-row items-center justify-center">
          <a href="/groups.html">
            <div class="flex flex-col items-center justify-center">
              <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M10.603 12.5679C10.603 14.371 12.0648 15.8328 13.8679 15.8328C15.6711 15.8328 17.1328 14.371 17.1328 12.5679C17.1328 10.7647 15.6711 9.30298 13.8679 9.30298C12.0648 9.30298 10.603 10.7647 10.603 12.5679Z"
                  fill="black" />
                <path
                  d="M19.3094 22.3626C19.3094 20.5594 16.8732 19.0977 13.8679 19.0977C10.8627 19.0977 8.42644 20.5594 8.42644 22.3626M23.6626 19.0981C23.6626 17.7593 22.3196 16.6087 20.3977 16.1049M4.07324 19.0981C4.07324 17.7593 5.41631 16.6087 7.33814 16.1049M20.3977 11.7365C21.0657 11.1387 21.486 10.2699 21.486 9.30298C21.486 7.49983 20.0243 6.03809 18.2211 6.03809C17.3849 6.03809 16.6222 6.35245 16.0445 6.86943M7.33814 11.7365C6.6702 11.1387 6.24984 10.2699 6.24984 9.30298C6.24984 7.49983 7.71159 6.03809 9.51474 6.03809C10.3509 6.03809 11.1137 6.35245 11.6913 6.86943M13.8679 15.8328C12.0648 15.8328 10.603 14.371 10.603 12.5679C10.603 10.7647 12.0648 9.30298 13.8679 9.30298C15.6711 9.30298 17.1328 10.7647 17.1328 12.5679C17.1328 14.371 15.6711 15.8328 13.8679 15.8328Z"
                  stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path
                  d="M19.3496 23.3594H8.35693V21.2221C8.35693 20.8064 8.61408 20.4341 9.00282 20.2869L13.4774 18.5926C13.7017 18.5077 13.9491 18.5062 14.1745 18.5885L18.8022 20.2781C19.2146 20.4287 19.4806 20.8307 19.4579 21.2692L19.3496 23.3594Z"
                  fill="black" />
              </svg>
              <span class="font-medium">Groups</span>
            </div>
          </a>
        </div>
      </li>
      <li class="flex-1">
        <div class="flex flex-row items-center justify-center">
          <a href="/report.html">
            <div class="flex flex-col items-center justify-center">
              <svg width="23" height="18" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M1.44043 6.25V1.5C1.44043 1.1 1.59043 0.75 1.89043 0.45C2.19043 0.15 2.54043 0 2.94043 0H19.9404C20.3404 0 20.6904 0.15 20.9904 0.45C21.2904 0.75 21.4404 1.1 21.4404 1.5V6.25H19.9404V1.5H2.94043V6.25H1.44043ZM2.94043 15C2.54043 15 2.19043 14.85 1.89043 14.55C1.59043 14.25 1.44043 13.9 1.44043 13.5V7.75H2.94043V13.5H19.9404V7.75H21.4404V13.5C21.4404 13.9 21.2904 14.25 20.9904 14.55C20.6904 14.85 20.3404 15 19.9404 15H2.94043ZM0.44043 18V16.5H22.4404V18H0.44043ZM1.44043 7.75V6.25H7.44043C7.57643 6.25 7.70628 6.28335 7.82993 6.35C7.95358 6.41665 8.04878 6.51665 8.11543 6.65L9.49043 9.45L12.7654 3.675C12.8321 3.54165 12.9279 3.44585 13.0529 3.3875C13.1779 3.32915 13.3081 3.3 13.4434 3.3C13.5788 3.3 13.7079 3.32915 13.8309 3.3875C13.9539 3.44585 14.0488 3.54165 14.1154 3.675L15.3792 6.25H21.4404V7.75H14.9154C14.7779 7.75 14.6467 7.71665 14.5217 7.65C14.3967 7.58335 14.3029 7.48335 14.2404 7.35L13.3904 5.625L10.1154 11.35C10.0534 11.4834 9.96033 11.5833 9.83618 11.65C9.71203 11.7167 9.58168 11.75 9.44518 11.75C9.30868 11.75 9.17793 11.7167 9.05293 11.65C8.92793 11.5833 8.83208 11.4834 8.76543 11.35L6.96543 7.75H1.44043Z"
                  fill="black" />
              </svg>

              <span>Report</span>
            </div>
          </a>
        </div>
      </li>
    </ul>
  </div>
  <div class="fixed p-4 bg-white inset-0 animate-slide-in translate-y-full hidden" hash-content="true" id="createGroup">
    <div class="flex flex-col">
      <div class="flex flex-row">
        <div class="flex flex-row items-center justify-start">
          <svg width="12" height="12" onclick="history.back()" viewBox="0 0 12 12" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M1.49971 11.5501L0.449707 10.5001L4.94971 6.0001L0.449707 1.5251L1.49971 0.475098L5.99971 4.9751L10.4747 0.475098L11.5247 1.5251L7.02471 6.0001L11.5247 10.5001L10.4747 11.5501L5.99971 7.0501L1.49971 11.5501Z"
              fill="black" />
          </svg>
        </div>
        <div class="flex flex-row items-center justify-end flex-[1]">
          <span class="text-blue-300" onclick="document.getElementById('createGroupForm')?.requestSubmit()">Create Group</span>
        </div>
      </div>
      <div class="flex flex-col mt-4">
        <form onsubmit="createGroup(event)" id="createGroupForm">
        <h2>Group Name:</h2>
        <input type="text"
          class="w-full ring-2 ring-offset-2 ring-transparent outline-none border border-solid border-gray-400/77 focus:ring-blue-400/88 rounded-lg p-2 mt-2"
          placeholder="Enter group name" name="group_name" required>
        </form>
      </div>
    </div>
  </div>
  <div class="fixed p-4 bg-white inset-0 animate-slide-in translate-y-full hidden" hash-content="true"
    id="assignMembers">
    <div class="flex flex-col">
      <div class="flex flex-row">
        <div class="flex flex-row items-center justify-start">
          <svg width="12" height="12" onclick="history.back()" viewBox="0 0 12 12" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M1.49971 11.5501L0.449707 10.5001L4.94971 6.0001L0.449707 1.5251L1.49971 0.475098L5.99971 4.9751L10.4747 0.475098L11.5247 1.5251L7.02471 6.0001L11.5247 10.5001L10.4747 11.5501L5.99971 7.0501L1.49971 11.5501Z"
              fill="black" />
          </svg>
        </div>
        <div class="flex flex-row items-center justify-end flex-[1]">
          <span class="text-blue-300"
            onclick="document.getElementById('assignMembers_selectGroup')?.requestSubmit()">Proceed.</span>
        </div>
      </div>
      <div class="flex flex-col mt-4">
        <h2>Select a group to assign members.</h2>
        <form onsubmit="assignMembers_selectGroup(event)" id="assignMembers_selectGroup">
          <select required name="group_name" type="text"
            class="ring-2 ring-offset-2 w-full ring-transparent outline-none border border-solid border-gray-400/77 focus:ring-blue-400/88 rounded-lg p-2 mt-2">
            <option value="">Select Group</option>
            <?php 
            foreach ($groups as $group) {
              echo '<option value="' . htmlspecialchars($group['name']) . '">' . htmlspecialchars($group['name']) . '</option>';
            }
            ?>
          </select>
        </form>
      </div>
    </div>
    <!-- Assign Members To Group Screen-->
    <div class="fixed bg-white inset-0 hidden overflow-auto" id="selectMemberForGroup">
      <div class="flex flex-row p-4 bg-white sticky top-0 py-4">
        <div class="flex flex-row items-center justify-start">
          <svg onclick="document.getElementById('selectMemberForGroup').classList.remove('hidden')" width="24"
            height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 22L0 12L10 2L11.4 3.425L2.825 12L11.4 20.575L10 22Z" fill="black" />
          </svg>
          <h2 class="text-lg font-semibold">Group: <span id="groupTitle"></span></h2>
        </div>
        <div class="flex flex-row items-center justify-end flex-[1]">
          <span class="text-blue-300"
            onclick="document.getElementById('assignMembers_selectMembers')?.requestSubmit()">Proceed.</span>
        </div>
      </div>
      <div class="flex flex-col mt-4 gap-4 p-4">
        <h2>Select members to assign:</h2>
        <form onsubmit="assignMembers_selectMembers(event)" id="assignMembers_selectMembers">
          <ul>
            <li>
              <label class="group">
                <input type="checkbox" class="hidden" name="member[]" value="4">
                <div class="flex p-2 rounded-xl">
                  <div class="flex justify-start items-center gap-4">
                    <span class="size-12 rounded-full bg-slate-200 group-has-checked:bg-blue-400"></span>
                    <span class="text-base">Member Name</span>
                  </div>
                  <div class="flex justify-end items-center">

                  </div>
                </div>
              </label>
            </li>
            <li>
              <label class="group">
                <input type="checkbox" class="hidden" name="member[]" value="3">
                <div class="flex p-2 rounded-xl">
                  <div class="flex justify-start items-center gap-4">
                    <span class="size-12 rounded-full bg-slate-200 group-has-checked:bg-blue-400"></span>
                    <span class="text-base">Member Name</span>
                  </div>
                  <div class="flex justify-end items-center">

                  </div>
                </div>
              </label>
            </li>
            <li>
              <label class="group">
                <input type="checkbox" class="hidden">
                <div class="flex p-2 rounded-xl">
                  <div class="flex justify-start items-center gap-4">
                    <span class="size-12 rounded-full bg-slate-200 group-has-checked:bg-blue-400"></span>
                    <span class="text-base">Member Name</span>
                  </div>
                  <div class="flex justify-end items-center">

                  </div>
                </div>
              </label>
            </li>
          </ul>
        </form>
      </div>
    </div>
    <!-- -->
  </div>
  <script>
    function handleHashEnter(hash = location.hash) {
      if (!hash) return;
      const y = document.querySelector(hash)
      y?.classList?.remove("hidden");
      y?.addEventListener('animationend', function () {
        y?.classList?.remove('translate-y-full');
      }, { once: true });
    }
    function handleHashLeave(hash = location.hash) {
      if (!hash) return;
      const y = document.querySelector(hash)
      y?.classList?.add('animate-slide-out');
      y?.addEventListener('animationend', function () {
        y?.classList?.remove('animate-slide-out');
        y?.classList?.add('hidden');
        y?.classList?.add('translate-y-full');
      }, { once: true });
    }
    handleHashEnter()

    onhashchange = function ({ newURL, oldURL }) {
      const newHash = new URL(newURL).hash
      const oldHash = new URL(oldURL).hash
      if (newHash) {
        handleHashEnter(newHash)
      }
      if (oldHash) {
        handleHashLeave(oldHash)
      }
    }
    function assignMembers_selectGroup(event) {
      event.preventDefault()
      const data = Object.fromEntries(new FormData(event.currentTarget))
      document.getElementById("groupTitle").innerText = data?.group_name;
      document.getElementById("selectMemberForGroup").classList.remove("hidden")
    }
    async function assignMembers_selectMembers(event) {
      event.preventDefault()
      let data = new FormData(event.currentTarget).getAll("member[]")
      data = {
        group_name: document.getElementById("groupTitle").innerText,
        members: data
      }
      // backend request processing
      console.log(data)
      // backend request processing
      history.back()
    }
    async function createGroup(event) {
      event.preventDefault()
      const data = new FormData(event.currentTarget)
      await fetch('http://localhost/sanjivani-api/api/groups/create', {
        method: 'POST',
        body: data,
        credentials: "include"
      }).catch(err => {
        console.error(err);
      });
      history.back()
      window.location.reload()
    }
  </script>
</body>

</html>