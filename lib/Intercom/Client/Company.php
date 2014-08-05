<?php

namespace Intercom\Client;

use InvalidArgumentException;

use GuzzleHttp\ClientInterface as Guzzle;

use Intercom\AbstractClient,
    Intercom\Exception\UserException,
    Intercom\Exception\BulkException,
    Intercom\Object\Company as CompanyObject,
    Intercom\Request\Search\UserSearch,
    Intercom\Request\PaginatedResponse,
    Intercom\Request\Request;

class Company extends AbstractClient
{
    /**
     * Get a Company
     *
     * @param int $companyId
     *
     * @throws \Intercom\Exception\UserException
     * @return CompanyObject
     */
    public function get($companyId)
    {
        if (null === $companyId) {
            throw new UserException('An companyId must be specified and are mandatory to get a Company');
        }

        $parameters = [
            "company_id" => $companyId
        ];

        $response = $this->send(new Request('GET', self::INTERCOM_BASE_URL . '/companies', $parameters));
        $companyData = $response->json();

        /**
         * Here we use the accessor to retrieve user_id and email, because if these keys doesn't exist the accessor
         * will return 'null' and the construct of the User object will throw an Exception.
         */
        $company = new CompanyObject(
            $this->accessor->getValue($companyData, '[id]'),
            $this->accessor->getValue($companyData, '[company_id]')
        );

        return $this->hydrate($company, $companyData);
    }

    /**
     * Retrieve some User from a search
     *
     * @param  UserSearch $search The search
     *
     * @return PaginatedResponse
     *
     * @todo The informations about pagination is lost for the moment.
     */
    public function search(UserSearch $search)
    {
        $response = $this->send(new Request('GET', self::INTERCOM_BASE_URL . '/companies', $search->format()))->json();
        $users = [];

        foreach ($response['users'] as $userData) {
            $user = new UserObject(
                $this->accessor->getValue($userData, '[user_id]'),
                $this->accessor->getValue($userData, '[email]')
            );

            $users[] = $this->hydrate($user, $userData);
        }

        return new PaginatedResponse($users, $response['pages']['page'], $response['pages']['next'], $response['pages']['total_pages'], $response['total_count']);
    }

    /**
     * Create a Company
     *
     * @param $company
     *
     * @throws \InvalidArgumentException
     *
     * @return UserObject
     */
    public function createOrUpdate($company)
    {
        if (is_array($company)) {
            return $this->bulk($company);
        }

        if (!$company instanceof CompanyObject) {
            throw new InvalidArgumentException("UserObject required");
        }

        $response = $this->send(new Request('POST', self::INTERCOM_BASE_URL . '/companies', [], $company->format()), false);


        return $this->hydrate($company, $response->json());
    }

    /**
     * удаление не реализовано в апи интеркома
     */
    public function delete()
    {
        return false;
    }
}
