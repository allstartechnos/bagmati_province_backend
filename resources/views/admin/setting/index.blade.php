@extends('layouts.admin', ['page' => 'Index'])

@section('title')
    {{ $panel ?? '' }}
@endsection


@section('content')
    <div class="row d-flex justify-content-center align-items-center">

        <div class="col-xl-9">
            <div class="card custom-card border">
                <div class="card-body">
                    <ul class="nav nav-tabs tab-style-6 mb-3 p-0" id="myTab" role="tablist">
                        <li class="nav-item text-start" role="presentation">
                            <button class="nav-link active w-100 text-start" id="edit-profile-tab" data-bs-toggle="tab"
                                data-bs-target="#edit-profile-tab-pane" type="button" role="tab"
                                aria-controls="edit-profile-tab-pane" aria-selected="true">Edit
                                Setting</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link w-100 " id="profile-about-tab" data-bs-toggle="tab"
                                data-bs-target="#profile-about-tab-pane" type="button" role="tab"
                                aria-controls="profile-about-tab-pane" aria-selected="true">General Setting</button>
                        </li>

                    </ul>
                    <div class="tab-content" id="profile-tabs">
                        {{-- <div class="tab-pane p-0 border-0" id="profile-about-tab-pane" role="tabpanel"
                            aria-labelledby="profile-about-tab" tabindex="0">

                            <div class="tab-content border-0">
                                <div class="tab-pane active show p-0" id="email-settings" role="tabpanel">
                                    <ul class="list-group list-group-flush rounded">
                                        <li class="list-group-item">
                                            <div class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                                <div class="col-xl-3">
                                                    <span class="fs-14 fw-medium mb-0">Keyboard Shortcuts :</span>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="keyboard-enable" id="keyboard-enable1">
                                                        <label class="form-check-label" for="keyboard-enable1">
                                                            Keyboard Shortcuts Enable
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="keyboard-enable" id="keyboard-disable2" checked="">
                                                        <label class="form-check-label" for="keyboard-disable2">
                                                            Keyboard Shortcuts Disable
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xl-5">
                                                    <div class="toggle toggle-success mb-0 float-sm-end on"
                                                        id="keyboard-shortcuts">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                                    <span class="fs-14 fw-medium mb-0">Menu View :</span>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Default View
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault2" checked="">
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Advanced View
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xl-5">
                                                    <div class="toggle toggle-success mb-0 float-sm-end on" id="menu-view">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                                <div class="col-xl-3">
                                                    <span class="fs-14 fw-medium mb-0">Images :</span>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="images-open"
                                                            id="images-open1">
                                                        <label class="form-check-label" for="images-open1">
                                                            Always Open Images
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="images-open"
                                                            id="images-hide2" checked="">
                                                        <label class="form-check-label" for="images-hide2">
                                                            Ask For Permission
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xl-5">
                                                    <div class="toggle toggle-success mb-0 float-sm-end on"
                                                        id="mails-images">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                                <div class="col-xl-3">
                                                    <span class="fs-14 fw-medium mb-0">Mail Send Action :</span>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="on-keyboard" checked="">
                                                        <label class="form-check-label" for="on-keyboard">
                                                            On Keyboard Action
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="on-buttonclick">
                                                        <label class="form-check-label" for="on-buttonclick">
                                                            On Button Click
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xl-5">
                                                    <div class="float-sm-end">
                                                        <a href="javascript:void(0)"
                                                            class="btn btn-success-ghost btn-sm">Learn-more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="row gy-3 d-sm-flex align-items-center justify-content-between">
                                                <div class="col-xl-3">
                                                    <span class="fs-14 fw-medium mb-0">Maximum Mails Per Page :</span>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="choices" data-type="select-one" tabindex="0"
                                                        role="combobox" aria-autocomplete="list" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <div class="choices__inner"><select
                                                                class="form-control choices__input" data-trigger=""
                                                                name="mail-per-page" id="mail-per-page" hidden=""
                                                                tabindex="-1" data-choice="active">
                                                                <option value="Choice 1"
                                                                    data-custom-properties="[object Object]">10</option>
                                                            </select>
                                                            <div class="choices__list choices__list--single">
                                                                <div class="choices__item choices__item--selectable"
                                                                    data-item="" data-id="1" data-value="Choice 1"
                                                                    data-custom-properties="[object Object]"
                                                                    aria-selected="true">10</div>
                                                            </div>
                                                        </div>
                                                        <div class="choices__list choices__list--dropdown"
                                                            aria-expanded="false"><input type="search"
                                                                name="search_terms"
                                                                class="choices__input choices__input--cloned"
                                                                autocomplete="off" autocapitalize="off"
                                                                spellcheck="false" role="textbox"
                                                                aria-autocomplete="list"
                                                                aria-label="This is a placeholder set in the config"
                                                                placeholder="Search">
                                                            <div class="choices__list" role="listbox">
                                                                <div id="choices--mail-per-page-item-choice-1"
                                                                    class="choices__item choices__item--choice is-selected choices__item--selectable is-highlighted"
                                                                    role="option" data-choice="" data-id="1"
                                                                    data-value="Choice 1"
                                                                    data-select-text="Press to select"
                                                                    data-choice-selectable="" aria-selected="true">10
                                                                </div>
                                                                <div id="choices--mail-per-page-item-choice-2"
                                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                                    role="option" data-choice="" data-id="2"
                                                                    data-value="Choice 2"
                                                                    data-select-text="Press to select"
                                                                    data-choice-selectable="">50</div>
                                                                <div id="choices--mail-per-page-item-choice-3"
                                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                                    role="option" data-choice="" data-id="3"
                                                                    data-value="Choice 3"
                                                                    data-select-text="Press to select"
                                                                    data-choice-selectable="">100</div>
                                                                <div id="choices--mail-per-page-item-choice-4"
                                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                                    role="option" data-choice="" data-id="4"
                                                                    data-value="Choice 3"
                                                                    data-select-text="Press to select"
                                                                    data-choice-selectable="">120</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-5">
                                                    <div class="toggle toggle-success mb-0 float-sm-end on"
                                                        id="mails-per-page">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                                <div class="col-xl-3">
                                                    <span class="fs-14 fw-medium mb-0">Mail Composer :</span>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="d-flex gap-4 align-items-center">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="mail-composer" id="mail-composeron1">
                                                            <label class="form-check-label" for="mail-composeron1">
                                                                Mail Composer On
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="mail-composer" id="mail-composeroff2"
                                                                checked="">
                                                            <label class="form-check-label" for="mail-composeroff2">
                                                                Mail Composer Off
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-5">
                                                    <div class="toggle toggle-success mb-0 float-sm-end on"
                                                        id="mail-composer">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="row gy-3 d-sm-flex align-items-center justify-content-between">
                                                <div class="col-xl-3">
                                                    <span class="fs-14 fw-medium mb-0">Language :</span>
                                                </div>
                                                <div class="col-xl-4">
                                                    <label for="mail-language" class="form-label">Languages :</label>
                                                    <div class="choices" data-type="select-multiple" role="combobox"
                                                        aria-autocomplete="list" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <div class="choices__inner"><select
                                                                class="form-control choices__input" name="mail-language"
                                                                id="mail-language" multiple="" hidden=""
                                                                tabindex="-1" data-choice="active">
                                                                <option value="Choice 1"
                                                                    data-custom-properties="[object Object]">English
                                                                </option>
                                                                <option value="Choice 3"
                                                                    data-custom-properties="[object Object]">Arabic
                                                                </option>
                                                                <option value="Choice 2"
                                                                    data-custom-properties="[object Object]">French
                                                                </option>
                                                                <option value="Choice 4"
                                                                    data-custom-properties="[object Object]">Hindi</option>
                                                            </select>
                                                            <div class="choices__list choices__list--multiple">
                                                                <div class="choices__item choices__item--selectable"
                                                                    data-item="" data-id="2" data-value="Choice 1"
                                                                    data-custom-properties="[object Object]"
                                                                    aria-selected="true" data-deletable="">English<button
                                                                        type="button" class="choices__button"
                                                                        aria-label="Remove item: 'Choice 1'"
                                                                        data-button="">Remove item</button></div>
                                                                <div class="choices__item choices__item--selectable"
                                                                    data-item="" data-id="3" data-value="Choice 3"
                                                                    data-custom-properties="[object Object]"
                                                                    aria-selected="true" data-deletable="">Arabic<button
                                                                        type="button" class="choices__button"
                                                                        aria-label="Remove item: 'Choice 3'"
                                                                        data-button="">Remove item</button></div>
                                                                <div class="choices__item choices__item--selectable"
                                                                    data-item="" data-id="4" data-value="Choice 2"
                                                                    data-custom-properties="[object Object]"
                                                                    aria-selected="true" data-deletable="">French<button
                                                                        type="button" class="choices__button"
                                                                        aria-label="Remove item: 'Choice 2'"
                                                                        data-button="">Remove item</button></div>
                                                                <div class="choices__item choices__item--selectable"
                                                                    data-item="" data-id="5" data-value="Choice 4"
                                                                    data-custom-properties="[object Object]"
                                                                    aria-selected="true" data-deletable="">Hindi<button
                                                                        type="button" class="choices__button"
                                                                        aria-label="Remove item: 'Choice 4'"
                                                                        data-button="">Remove item</button></div>
                                                            </div><input type="search" name="search_terms"
                                                                class="choices__input choices__input--cloned"
                                                                autocomplete="off" autocapitalize="off"
                                                                spellcheck="false" role="textbox"
                                                                aria-autocomplete="list" aria-label="null"
                                                                aria-activedescendant="choices--mail-language-item-choice-4"
                                                                style="min-width: 1ch; width: 1ch;">
                                                        </div>
                                                        <div class="choices__list choices__list--dropdown"
                                                            aria-expanded="false">
                                                            <div class="choices__list" aria-multiselectable="true"
                                                                role="listbox">
                                                                <div
                                                                    class="choices__item choices__item--choice has-no-choices">
                                                                    No choices to choose from</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-5">
                                                    <div class="toggle toggle-success mb-0 float-sm-end on"
                                                        id="mail-languages">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="row gy-2 d-sm-flex align-items-center justify-content-between">
                                                <div class="col-xl-3">
                                                    <span class="fs-14 fw-medium mb-0">Auto Correct :</span>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="d-flex gap-4 align-items-center">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="auto-correct" id="auto-correcton1">
                                                            <label class="form-check-label" for="auto-correcton1">
                                                                Auto Correct On
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="auto-correct" id="auto-correctoff2" checked="">
                                                            <label class="form-check-label" for="auto-correctoff2">
                                                                Auto Correct Off
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-5">
                                                    <div class="toggle toggle-success mb-0 float-sm-end on"
                                                        id="auto-correct">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane p-0" id="security" role="tabpanel">
                                    <ul class="list-group list-group-flush list-unstyled rounded">
                                        <li class="list-group-item">
                                            <div class="row gx-5 gy-3">
                                                <div class="col-xl-4">
                                                    <p class="fs-16 mb-1 fw-medium">Logging In</p>
                                                    <p class="fs-12 mb-0 text-muted">Security settings related to logging
                                                        into our email account and taking down account if any mischevious
                                                        action happended.</p>
                                                </div>
                                                <div class="col-xl-8">
                                                    <div
                                                        class="d-sm-flex d-block align-items-top justify-content-between mt-sm-0 mt-3">
                                                        <div class="mail-security-settings">
                                                            <p class="fs-14 mb-1 fw-medium">Max Limit for login attempts
                                                            </p>
                                                            <p class="fs-12 mb-0 text-muted mb-sm-0 mb-2">Account will
                                                                freeze for 24hrs while attempt to login with wrong
                                                                credentials for selected number of times</p>
                                                        </div>
                                                        <div>
                                                            <div class="choices" data-type="select-one" tabindex="0"
                                                                role="combobox" aria-autocomplete="list"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <div class="choices__inner"><select
                                                                        class="form-control choices__input"
                                                                        data-trigger="" name="max-login-attempts"
                                                                        id="max-login-attempts" hidden=""
                                                                        tabindex="-1" data-choice="active">
                                                                        <option value="Choice 1"
                                                                            data-custom-properties="[object Object]">3
                                                                            Attempts</option>
                                                                    </select>
                                                                    <div class="choices__list choices__list--single">
                                                                        <div class="choices__item choices__item--selectable"
                                                                            data-item="" data-id="1"
                                                                            data-value="Choice 1"
                                                                            data-custom-properties="[object Object]"
                                                                            aria-selected="true">3 Attempts</div>
                                                                    </div>
                                                                </div>
                                                                <div class="choices__list choices__list--dropdown"
                                                                    aria-expanded="false"><input type="search"
                                                                        name="search_terms"
                                                                        class="choices__input choices__input--cloned"
                                                                        autocomplete="off" autocapitalize="off"
                                                                        spellcheck="false" role="textbox"
                                                                        aria-autocomplete="list"
                                                                        aria-label="This is a placeholder set in the config"
                                                                        placeholder="Search">
                                                                    <div class="choices__list" role="listbox">
                                                                        <div id="choices--max-login-attempts-item-choice-1"
                                                                            class="choices__item choices__item--choice is-selected choices__item--selectable is-highlighted"
                                                                            role="option" data-choice="" data-id="1"
                                                                            data-value="Choice 1"
                                                                            data-select-text="Press to select"
                                                                            data-choice-selectable=""
                                                                            aria-selected="true">3 Attempts</div>
                                                                        <div id="choices--max-login-attempts-item-choice-2"
                                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                                            role="option" data-choice="" data-id="2"
                                                                            data-value="Choice 2"
                                                                            data-select-text="Press to select"
                                                                            data-choice-selectable="">5 Attempts</div>
                                                                        <div id="choices--max-login-attempts-item-choice-3"
                                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                                            role="option" data-choice="" data-id="3"
                                                                            data-value="Choice 3"
                                                                            data-select-text="Press to select"
                                                                            data-choice-selectable="">10 Attempts</div>
                                                                        <div id="choices--max-login-attempts-item-choice-4"
                                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                                            role="option" data-choice="" data-id="4"
                                                                            data-value="Choice 3"
                                                                            data-select-text="Press to select"
                                                                            data-choice-selectable="">20 Attempts</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-sm-flex d-block align-items-top justify-content-between mt-3">
                                                        <div>
                                                            <p class="fs-14 mb-1 fw-medium">Account Freeze time management
                                                            </p>
                                                            <p class="fs-12 mb-0 text-muted mb-sm-0 mb-2">You can change
                                                                the time for the account freeze when attempts for </p>
                                                        </div>
                                                        <div>
                                                            <div class="choices" data-type="select-one" tabindex="0"
                                                                role="combobox" aria-autocomplete="list"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <div class="choices__inner"><select
                                                                        class="form-control choices__input"
                                                                        data-trigger="" name="account-freeze-time-format"
                                                                        id="account-freeze-time-format" hidden=""
                                                                        tabindex="-1" data-choice="active">
                                                                        <option value="Choice 1"
                                                                            data-custom-properties="[object Object]">1 Day
                                                                        </option>
                                                                    </select>
                                                                    <div class="choices__list choices__list--single">
                                                                        <div class="choices__item choices__item--selectable"
                                                                            data-item="" data-id="1"
                                                                            data-value="Choice 1"
                                                                            data-custom-properties="[object Object]"
                                                                            aria-selected="true">1 Day</div>
                                                                    </div>
                                                                </div>
                                                                <div class="choices__list choices__list--dropdown"
                                                                    aria-expanded="false"><input type="search"
                                                                        name="search_terms"
                                                                        class="choices__input choices__input--cloned"
                                                                        autocomplete="off" autocapitalize="off"
                                                                        spellcheck="false" role="textbox"
                                                                        aria-autocomplete="list"
                                                                        aria-label="This is a placeholder set in the config"
                                                                        placeholder="Search">
                                                                    <div class="choices__list" role="listbox">
                                                                        <div id="choices--account-freeze-time-format-item-choice-1"
                                                                            class="choices__item choices__item--choice is-selected choices__item--selectable is-highlighted"
                                                                            role="option" data-choice="" data-id="1"
                                                                            data-value="Choice 1"
                                                                            data-select-text="Press to select"
                                                                            data-choice-selectable=""
                                                                            aria-selected="true">1 Day</div>
                                                                        <div id="choices--account-freeze-time-format-item-choice-2"
                                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                                            role="option" data-choice="" data-id="2"
                                                                            data-value="Choice 2"
                                                                            data-select-text="Press to select"
                                                                            data-choice-selectable="">1 Hour</div>
                                                                        <div id="choices--account-freeze-time-format-item-choice-3"
                                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                                            role="option" data-choice="" data-id="3"
                                                                            data-value="Choice 3"
                                                                            data-select-text="Press to select"
                                                                            data-choice-selectable="">1 Month</div>
                                                                        <div id="choices--account-freeze-time-format-item-choice-4"
                                                                            class="choices__item choices__item--choice choices__item--selectable"
                                                                            role="option" data-choice="" data-id="4"
                                                                            data-value="Choice 3"
                                                                            data-select-text="Press to select"
                                                                            data-choice-selectable="">1 Year</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="row gx-5 gy-3">
                                                <div class="col-xl-4">
                                                    <p class="fs-16 mb-1 fw-medium">Password Requirements</p>
                                                    <p class="fs-12 mb-0 text-muted">Security settings related to password
                                                        strength.</p>
                                                </div>
                                                <div class="col-xl-8">
                                                    <div
                                                        class="d-sm-flex d-block align-items-top justify-content-between mt-sm-0 mt-3 gap-3">
                                                        <div class="mail-security-settings">
                                                            <p class="fs-14 mb-1 fw-medium">Minimum number of characters in
                                                                the password</p>
                                                            <p class="fs-12 mb-0 text-muted">There should be a minimum
                                                                number of characters for a password to be validated that
                                                                shouls be set here.</p>
                                                        </div>
                                                        <div>
                                                            <input type="text" class="form-control" value="8">
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-sm-flex d-block align-items-top justify-content-between mt-3">
                                                        <div>
                                                            <p class="fs-14 mb-1 fw-medium">Contain A Number</p>
                                                            <p class="fs-12 mb-0 text-muted">Password should contain a
                                                                number.</p>
                                                        </div>
                                                        <div class="toggle toggle-success on mb-0 float-sm-end"
                                                            id="password-number">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-sm-flex d-block align-items-top justify-content-between mt-3">
                                                        <div>
                                                            <p class="fs-14 mb-1 fw-medium">Contain A Special Character</p>
                                                            <p class="fs-12 mb-0 text-muted">Password should contain a
                                                                special Character.</p>
                                                        </div>
                                                        <div class="toggle toggle-success on mb-0 float-sm-end"
                                                            id="password-special-character">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-sm-flex d-block align-items-top justify-content-between mt-3">
                                                        <div>
                                                            <p class="fs-14 mb-1 fw-medium">Atleast One Capital Letter</p>
                                                            <p class="fs-12 mb-0 text-muted">Password should contain
                                                                atleast one capital letter.</p>
                                                        </div>
                                                        <div class="toggle toggle-success mb-0 float-sm-end"
                                                            id="password-capital">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-sm-flex d-block align-items-top justify-content-between mt-3">
                                                        <div>
                                                            <p class="fs-14 mb-1 fw-medium">Maximum Password Length</p>
                                                            <p class="fs-12 mb-0 text-muted">Maximum password lenth should
                                                                be selected here.</p>
                                                        </div>
                                                        <div>
                                                            <input type="text" class="form-control" value="16">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="row gx-5 gy-3">
                                                <div class="col-xl-4">
                                                    <p class="fs-16 mb-1 fw-medium">Unknown Chats</p>
                                                    <p class="fs-12 mb-0 text-muted">Security settings related to unknown
                                                        chats.</p>
                                                </div>
                                                <div class="col-xl-8">
                                                    <div class="btn-group float-sm-end" role="group"
                                                        aria-label="Basic radio toggle button group">
                                                        <input type="radio" class="btn-check" name="btnunknownchats"
                                                            id="unknown-chats-show" checked="">
                                                        <label class="btn btn-outline-light"
                                                            for="unknown-chats-show">Show</label>
                                                        <input type="radio" class="btn-check" name="btnunknownchats"
                                                            id="unknown-chats-hide">
                                                        <label class="btn btn-outline-light"
                                                            for="unknown-chats-hide">Hide</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane p-0" id="notification-settings" role="tabpanel">
                                    <ul class="list-group list-group-flush list-unstyled rounded">
                                        <li class="list-group-item">
                                            <div class="row gx-5 gy-3">
                                                <div class="col-xl-5">
                                                    <p class="fs-16 mb-1 fw-medium">Email Notifications</p>
                                                    <p class="fs-12 mb-0 text-muted">Email notifications are the
                                                        notifications you will receeive when you are offline, you can
                                                        customize them by enabling or disabling them.</p>
                                                </div>
                                                <div class="col-xl-7">
                                                    <div
                                                        class="d-flex align-items-top justify-content-between mt-sm-0 mt-3">
                                                        <div class="mail-notification-settings">
                                                            <p class="fs-14 mb-1 fw-medium">Updates &amp; Features</p>
                                                            <p class="fs-12 mb-0 text-muted">Notifications about new
                                                                updates and their features.</p>
                                                        </div>
                                                        <div class="toggle toggle-success on mb-0 float-sm-end"
                                                            id="update-features">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-top justify-content-between mt-3">
                                                        <div class="mail-notification-settings">
                                                            <p class="fs-14 mb-1 fw-medium">Early Access</p>
                                                            <p class="fs-12 mb-0 text-muted">Users are selected for beta
                                                                testing of new update,notifications relating or participate
                                                                in any of paid product promotion.</p>
                                                        </div>
                                                        <div class="toggle toggle-success mb-0 float-sm-end"
                                                            id="early-access">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-top justify-content-between mt-3">
                                                        <div class="mail-notification-settings">
                                                            <p class="fs-14 mb-1 fw-medium">Email Shortcuts</p>
                                                            <p class="fs-12 mb-0 text-muted">Shortcut notifications for
                                                                email.</p>
                                                        </div>
                                                        <div class="toggle toggle-success on mb-0 float-sm-end"
                                                            id="email-shortcut">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-top justify-content-between mt-3">
                                                        <div class="mail-notification-settings">
                                                            <p class="fs-14 mb-1 fw-medium">New Mails</p>
                                                            <p class="fs-12 mb-0 text-muted">Notifications related to new
                                                                mails received.</p>
                                                        </div>
                                                        <div class="toggle toggle-success on mb-0 float-sm-end"
                                                            id="new-mails">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-top justify-content-between mt-3">
                                                        <div class="mail-notification-settings">
                                                            <p class="fs-14 mb-1 fw-medium">Mail Chat Messages</p>
                                                            <p class="fs-12 mb-0 text-muted">Any of new messages are
                                                                received will be updated through notifications.</p>
                                                        </div>
                                                        <div class="toggle toggle-success on mb-0 float-sm-end"
                                                            id="mail-chat-messages">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="row gx-5 gy-3">
                                                <div class="col-xl-5">
                                                    <p class="fs-16 mb-1 fw-medium">Push Notifications</p>
                                                    <p class="fs-12 mb-0 text-muted">Push notifications are recieved when
                                                        you are online, you can customize them by enabling or disabling
                                                        them.</p>
                                                </div>
                                                <div class="col-xl-7">
                                                    <div
                                                        class="d-flex align-items-top justify-content-between mt-sm-0 mt-3">
                                                        <div class="mail-notification-settings">
                                                            <p class="fs-14 mb-1 fw-medium">New Mails</p>
                                                            <p class="fs-12 mb-0 text-muted">Notifications related to new
                                                                mails received.</p>
                                                        </div>
                                                        <div class="toggle toggle-success on mb-0 float-sm-end"
                                                            id="push-new-mails">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-top justify-content-between mt-3">
                                                        <div class="mail-notification-settings">
                                                            <p class="fs-14 mb-1 fw-medium">Mail Chat Messages</p>
                                                            <p class="fs-12 mb-0 text-muted">Any of new messages are
                                                                received will be updated through notifications.</p>
                                                        </div>
                                                        <div class="toggle toggle-success on mb-0 float-sm-end"
                                                            id="push-mail-chat-messages">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-top justify-content-between mt-3">
                                                        <div class="mail-notification-settings">
                                                            <p class="fs-14 mb-1 fw-medium">Mail Extensions</p>
                                                            <p class="fs-12 mb-0 text-muted">Notifications related to the
                                                                extensions received by new emails and thier propertied also
                                                                been displayed.</p>
                                                        </div>
                                                        <div class="toggle toggle-success mb-0 float-sm-end"
                                                            id="mail-extensions">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane p-0" id="account-settings" role="tabpanel">
                                    <div class="row gy-3">
                                        <div class="col-xxl-7">
                                            <div class="card custom-card shadow-none mb-0">
                                                <div class="card-body">
                                                    <div
                                                        class="d-sm-flex d-block align-items-top mb-4 justify-content-between">
                                                        <div class="w-75">
                                                            <p class="fs-14 mb-1 fw-medium">Two Step Verification</p>
                                                            <p class="fs-12 text-muted mb-0">Two-step verification provides
                                                                enhanced security measures and helps prevent unauthorized
                                                                access and fraudulent activities.</p>
                                                        </div>
                                                        <div class="toggle toggle-success on mb-0"
                                                            id="two-step-verification">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-sm-flex d-block align-items-top mb-4 justify-content-between">
                                                        <div class="mb-sm-0 mb-2 w-75">
                                                            <p class="fs-14 mb-2 fw-medium">Authentication</p>
                                                            <div class="mb-0 authentication-btn-group">
                                                                <div class="btn-group" role="group"
                                                                    aria-label="Basic radio toggle button group">
                                                                    <input type="radio" class="btn-check"
                                                                        name="btnradio" id="btnradio1" checked="">
                                                                    <label class="btn btn-outline-light"
                                                                        for="btnradio1"><i
                                                                            class="ri-lock-unlock-line me-1 align-middle d-inline-block"></i>Pin</label>
                                                                    <input type="radio" class="btn-check"
                                                                        name="btnradio" id="btnradio2">
                                                                    <label class="btn btn-outline-light"
                                                                        for="btnradio2"><i
                                                                            class="ri-lock-password-line me-1 align-middle d-inline-block"></i>Password</label>
                                                                    <input type="radio" class="btn-check"
                                                                        name="btnradio" id="btnradio3">
                                                                    <label class="btn btn-outline-light"
                                                                        for="btnradio3"><i
                                                                            class="ri-fingerprint-line me-1 align-middle d-inline-block"></i>Finger
                                                                        Print</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="toggle toggle-success on mb-0 ms-0 mt-sm-0 mt-2"
                                                            id="authentication">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-sm-flex d-block align-items-top mb-4 justify-content-between">
                                                        <div class="w-75">
                                                            <p class="fs-14 mb-1 fw-medium">Recovery Mail</p>
                                                            <p class="fs-12 text-muted mb-0">In case of forgetting
                                                                passwords, emails are sent to aana14@gmail.com.</p>
                                                        </div>
                                                        <div class="toggle toggle-success on mb-0 ms-0 mt-sm-0 mt-2"
                                                            id="recovery-mail">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-sm-flex d-block align-items-top mb-4 justify-content-between">
                                                        <div>
                                                            <p class="fs-14 mb-1 fw-medium">SMS Recovery</p>
                                                            <p class="fs-12 text-muted mb-0">In case of recovery, SMS
                                                                messages are sent to 9876543xx</p>
                                                        </div>
                                                        <div class="toggle toggle-success on mb-0 ms-0 mt-sm-0 mt-2"
                                                            id="sms-recovery">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-top justify-content-between">
                                                        <div>
                                                            <p class="fs-14 mb-1 fw-medium">Reset Password</p>
                                                            <p class="fs-12 text-muted">Password should be min of <b
                                                                    class="text-success">8 digits<sup>*</sup></b>,atleast
                                                                <b class="text-success">One Capital letter<sup>*</sup></b>
                                                                and <b class="text-success">One Special
                                                                    Character<sup>*</sup></b> included.
                                                            </p>
                                                            <div class="mb-2">
                                                                <label for="current-password" class="form-label">Current
                                                                    Password</label>
                                                                <input type="text" class="form-control"
                                                                    id="current-password" placeholder="Current Password">
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="new-password" class="form-label">New
                                                                    Password</label>
                                                                <input type="text" class="form-control"
                                                                    id="new-password" placeholder="New Password">
                                                            </div>
                                                            <div class="mb-0">
                                                                <label for="confirm-password" class="form-label">Confirm
                                                                    Password</label>
                                                                <input type="text" class="form-control"
                                                                    id="confirm-password" placeholder="Confirm Password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-5">
                                            <div class="card custom-card shadow-none mb-0">
                                                <div class="card-header justify-content-between d-sm-flex d-block">
                                                    <div class="card-title">Registered Devices</div>
                                                    <div class="mt-sm-0 mt-2">
                                                        <button class="btn btn-sm btn-primary">Signout from all
                                                            devices</button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <ul class="list-group">
                                                        <li class="list-group-item">
                                                            <div class="d-sm-flex d-block align-items-top">
                                                                <div class="lh-1 mb-sm-0 mb-2"><i
                                                                        class="bi bi-phone me-2 fs-16 align-middle text-muted"></i>
                                                                </div>
                                                                <div class="lh-1 flex-fill">
                                                                    <p class="mb-1">
                                                                        <span class="fw-medium">Mobile-LG-1023</span>
                                                                    </p>
                                                                    <p class="mb-0">
                                                                        <span class="text-muted fs-11">Manchester, UK-Nov
                                                                            30, 04:45PM</span>
                                                                    </p>
                                                                </div>
                                                                <div class="dropdown mt-sm-0 mt-2">
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-icon btn-sm btn-light"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="fe fe-more-vertical"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);">Action</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);">Another
                                                                                action</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);">Something else
                                                                                here</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="d-sm-flex d-block align-items-top">
                                                                <div class="lh-1 mb-sm-0 mb-2"><i
                                                                        class="bi bi-laptop me-2 fs-16 align-middle text-muted"></i>
                                                                </div>
                                                                <div class="lh-1 flex-fill">
                                                                    <p class="mb-1">
                                                                        <span class="fw-medium">Lenovo-1291203</span>
                                                                    </p>
                                                                    <p class="mb-0">
                                                                        <span class="text-muted fs-11">England, UK-Aug 12,
                                                                            12:25PM</span>
                                                                    </p>
                                                                </div>
                                                                <div class="dropdown mt-sm-0 mt-2">
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-icon btn-sm btn-light"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="fe fe-more-vertical"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);">Action</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);">Another
                                                                                action</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);">Something else
                                                                                here</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="d-sm-flex d-block align-items-top">
                                                                <div class="lh-1 mb-sm-0 mb-2"><i
                                                                        class="bi bi-laptop me-2 fs-16 align-middle text-muted"></i>
                                                                </div>
                                                                <div class="lh-1 flex-fill">
                                                                    <p class="mb-1">
                                                                        <span class="fw-medium">Macbook-Suzika</span>
                                                                    </p>
                                                                    <p class="mb-0">
                                                                        <span class="text-muted fs-11">Brightoon, UK-Jul
                                                                            18, 8:34AM</span>
                                                                    </p>
                                                                </div>
                                                                <div class="dropdown mt-sm-0 mt-2">
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-icon btn-sm btn-light"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="fe fe-more-vertical"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);">Action</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);">Another
                                                                                action</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);">Something else
                                                                                here</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="d-sm-flex d-block align-items-top">
                                                                <div class="lh-1 mb-sm-0 mb-2"><i
                                                                        class="bi bi-pc-display-horizontal me-2 fs-16 align-middle text-muted"></i>
                                                                </div>
                                                                <div class="lh-1 flex-fill">
                                                                    <p class="mb-1">
                                                                        <span class="fw-medium">Apple-Desktop</span>
                                                                    </p>
                                                                    <p class="mb-0">
                                                                        <span class="text-muted fs-11">Darlington, UK-Jan
                                                                            14, 11:14AM</span>
                                                                    </p>
                                                                </div>
                                                                <div class="dropdown mt-sm-0 mt-2">
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-icon btn-sm btn-light"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="fe fe-more-vertical"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);">Action</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);">Another
                                                                                action</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);">Something else
                                                                                here</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="tab-pane show active p-0 border-0" id="edit-profile-tab-pane" role="tabpanel"
                            aria-labelledby="edit-profile-tab" tabindex="0">

                            <form action="{{ route($base_route . 'store') }}" method="POST" enctype="multipart/form-data"
                                class="main_form">

                                @csrf
                                <ul class="list-group list-group-flush border rounded-3">
                                    <li class="list-group-item p-3">

                                        <div class="row gy-3 align-items-center">

                                            <div class="col-xl-3">
                                                <div class="lh-3">
                                                    <span class="fw-medium mt-3">Logo Image :</span>
                                                    <span class="avatar avatar-m avatar-rounded float-end">
                                                        @if ($setting && $setting->logo)
                                                            <img src="{{ asset($img_path . $setting->logo) }}"
                                                                alt="Profile Image" class="settingLogo">
                                                        @else
                                                            <img src="{{ asset('backend/assets/images/faces/11.jpg') }}"
                                                                alt="">
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-xl-9">
                                                <input type="file" name="logo" id="logo" hidden>
                                                <label for="logo"
                                                    class="btn btn-secondary btn-sm btn-wave waves-effect waves-light">
                                                    Upload Logo
                                                </label>

                                                <span id="fileName" class="ms-2 text-muted"> </span>
                                                <button type="submit" id="logo"
                                                    class="btn btn-sm btn-primary btn-wave waves-effect waves-light"><i
                                                        class="ri-upload-2-line me-1"></i>Submit </button>
                                            </div>

                                            <div class="col-xl-3">
                                                <div class="lh-3">
                                                    <span class="fw-medium mt-3">Fav Icon Image :</span>
                                                    <span class="avatar avatar-m avatar-rounded float-end">
                                                        @if ($setting && $setting->fav_icon)
                                                            <img src="{{ asset($img_path . $setting->fav_icon) }}"
                                                                alt="Profile Image" class="settingFavIcon">
                                                        @else
                                                            <img src="{{ asset('backend/assets/images/faces/11.jpg') }}"
                                                                alt="">
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-xl-9">
                                                <input type="file" name="fav_icon" id="fav_icon" hidden>
                                                <label for="fav_icon"
                                                    class="btn btn-secondary btn-sm btn-wave waves-effect waves-light">
                                                    Upload FavIcon
                                                </label>

                                                <span id="fileName" class="ms-2 text-muted"> </span>
                                                <button type="submit" id="fav_icon"
                                                    class="btn btn-sm btn-primary btn-wave waves-effect waves-light"><i
                                                        class="ri-upload-2-line me-1"></i>Submit </button>
                                            </div>

                                            <div class="col-xl-3">
                                                <div class="lh-1">
                                                    <span class="fw-medium">Slogan :</span>

                                                </div>
                                            </div>
                                            <div class="col-xl-9">
                                                <textarea name="slogan" class="form-control" rows="5">{{ isset($setting->slogan) ? $setting->slogan : old('slogan') }}</textarea>
                                                <div class="text-danger">{{ $errors->first('slogan') }}
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="lh-1">
                                                    <span class="fw-medium">Email :</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-9">
                                                <input type="email" name="email" class="form-control"
                                                    value="{{ isset($setting->email) ? $setting->email : old('email') }}">

                                            </div>


                                        </div>
                                    </li>
                                    <li class="list-group-item p-3">

                                        <div class="row gy-3 align-items-center">

                                            <div class="col-xl-3">
                                                <div class="lh-1">
                                                    <span class="fw-medium">Phone :</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <input type="text" name="phone" class="form-control"
                                                    value="{{ isset($setting->phone) ? $setting->phone : old('phone') }}">
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="lh-1">
                                                    <span class="fw-medium">Phone Two :</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <input type="text" name="phone_two" class="form-control"
                                                    value="{{ isset($setting->phone_two) ? $setting->phone_two : old('phone_two') }}">
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="lh-1">
                                                    <span class="fw-medium">Mobile :</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-9">
                                                <input type="text" name="mobile" class="form-control"
                                                    value="{{ isset($setting->mobile) ? $setting->mobile : old('mobile') }}">
                                            </div>

                                            <div class="col-xl-3">
                                                <div class="lh-1">
                                                    <span class="fw-medium">Licence :</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-9">
                                                <input type="text" name="licence" class="form-control"
                                                    value="{{ isset($setting->licence) ? $setting->licence : old('licence') }}">
                                            </div>

                                            <div class="col-xl-3">
                                                <div class="lh-1">
                                                    <span class="fw-medium">Address :</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-9">
                                                <input type="text" name="address" class="form-control"
                                                    value="{{ isset($setting->address) ? $setting->address : old('address') }}">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item p-3">
                                        <span class="fw-medium fs-15 d-block mb-3 fw-bold">Social Info :</span>
                                        <div class="row gy-3 align-items-center">

                                            <div class="col-xl-3">
                                                <div class="lh-1">
                                                    <span class="fw-medium">Facebook :</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-9">
                                                <input type="text" name="facebook" class="form-control"
                                                    value="{{ isset($setting->facebook) ? $setting->facebook : old('facebook') }}">
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="lh-1">
                                                    <span class="fw-medium">Twitter :</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-9">
                                                <input type="text" name="twitter" class="form-control"
                                                    value="{{ isset($setting->twitter) ? $setting->twitter : old('twitter') }}">
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="lh-1">
                                                    <span class="fw-medium">Youtube :</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-9">
                                                <input type="text" name="youtube" class="form-control"
                                                    value="{{ isset($setting->youtube) ? $setting->youtube : old('youtube') }}">
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="lh-1">
                                                    <span class="fw-medium">Linkedin :</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-9">
                                                <input type="text" name="linkedin" class="form-control"
                                                    value="{{ isset($setting->linkedin) ? $setting->linkedin : old('linkedin') }}">
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="lh-1">
                                                    <span class="fw-medium">WhatsApp :</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-9">
                                                <input type="text" name="whatsapp" class="form-control"
                                                    value="{{ isset($setting->whatsapp) ? $setting->whatsapp : old('whatsapp') }}">
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="lh-1">
                                                    <span class="fw-medium">Viber :</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-9">
                                                <input type="text" name="viber" class="form-control"
                                                    value="{{ isset($setting->viber) ? $setting->viber : old('viber') }}">
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="lh-1">
                                                    <span class="fw-medium">Instagram :</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-9">
                                                <input type="text" class="form-control" name="instagram"
                                                    value="{{ isset($setting->instagram) ? $setting->instagram : old('instagram') }}">
                                            </div>

                                            <div class="col-xl-3">
                                                <div class="lh-1">
                                                    <span class="fw-medium">Google Map :</span>

                                                </div>
                                            </div>
                                            <div class="col-xl-9">
                                                <textarea name="google_map" class="form-control">{{ isset($setting->google_map) ? $setting->google_map : old('google_map') }}</textarea>
                                                <div class="text-danger">{{ $errors->first('google_map') }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end p-3">
                                            <button type="submit" data-button="page"
                                                class="formButton btn btn-danger">Update
                                                Setting</button>
                                        </div>
                            </form>

                        </div>
                        </li>

                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        //Setting Image
        function updateData(res) {
            if (res.setting) {
                let setting = res.setting

                if (setting.logo) {
                    $('.settingLogo').attr('src', res.image_path + setting.logo);
                } else {
                    $('.settingLogo').attr('src', '/dummy_image.jpg');
                }

                if (setting.fav_icon) {
                    $('.settingFavIcon').attr('src', res.image_path + setting.fav_icon);
                } else {
                    $('.settingFavIcon').attr('src', '/dummy_image.jpg');
                }
            }
        }
    </script>
@endpush
